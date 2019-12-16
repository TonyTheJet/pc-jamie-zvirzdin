<?php
class UserSession {

    // private constants
    private const SESSION_KEY_GRAD_STUDENT = 'grad-student';
    private const SESSION_KEY_IS_ADMIN = 'is-admin';
    private const SESSION_KEY_SECTION_DATA_ARR = 'sections-arr';
    // end private constants

    // private members
    /**
     * @var PDO
     */
    private $db;
    /**
     * @var GradStudent|null
     */
    private $grad_student = null;
    private $is_admin = false;

    /**
     * @var StudentSectionData[]
     */
    private $section_data_arr = [];
    // end private members

    // public functions
    public function get_grad_student(): ?GradStudent { return $this->grad_student; }
    public function get_is_admin(): bool { return $this->is_admin; }
    public function get_section_data_arr(): array { return $this->section_data_arr; }

    public function __construct(PDO $db)
    {
        $this->db = $db;
        $this->load_from_session_files();
    }

    public function authenticate_admin_hash(string $admin_hash): bool {
        if (defined('ADMIN_HASH') && $admin_hash === ADMIN_HASH) {
            $_SESSION[self::SESSION_KEY_IS_ADMIN] = true;

            return true;
        } else {
            $_SESSION[self::SESSION_KEY_IS_ADMIN] = false;

            return false;
        }
    }

    public function authenticate_credentials(string $email, string $section_number): bool {
        $sql = "
            SELECT gs.email, gs.name, SS.semesterId
            FROM GradStudents gs
            INNER JOIN GradStudentSections gss ON gs.email = gss.email
            INNER JOIN SemesterSections SS on gss.sectionNumber = SS.sectionNumber
            WHERE gs.email = :email AND gss.sectionNumber = :section_number;
        ";
        $statement = $this->db->prepare($sql);
        if ($statement){
            if ($statement->execute([':email' => $email, ':section_number' => $section_number])){
                $rows = $statement->fetchAll();
                foreach ($rows as $row){

                    // assign grad student
                    $this->grad_student = new GradStudent($email, $row['name']);
                    $_SESSION[self::SESSION_KEY_GRAD_STUDENT] = serialize($this->grad_student);

                    // assign section data
                    $this->section_data_arr = $this->grad_student->fetch_sections($this->db, (int) $row['semesterId']);
                    $_SESSION[self::SESSION_KEY_SECTION_DATA_ARR] = serialize($this->section_data_arr);

                    return true;
                }

                return false;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    // end public functions

    // private functions
    private function load_from_session_files(): void {

        // load grad_student
        if (isset($_SESSION[self::SESSION_KEY_GRAD_STUDENT])){
            $this->grad_student = unserialize($_SESSION[self::SESSION_KEY_GRAD_STUDENT]);
        }

        // load is_admin
        if (isset($_SESSION[self::SESSION_KEY_IS_ADMIN])){
            $this->is_admin = $_SESSION[self::SESSION_KEY_IS_ADMIN];
        }

        // load section_data_arr
        if (isset($_SESSION[self::SESSION_KEY_SECTION_DATA_ARR])){
            $this->section_data_arr = unserialize($_SESSION[self::SESSION_KEY_SECTION_DATA_ARR]);
        }
    }
    // end private functions
}