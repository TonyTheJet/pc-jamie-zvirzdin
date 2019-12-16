<?php
class GradStudent {

	// private members
	private $email;
	private $name;
	// end private members

	// public functions
	public function get_email(): string { return $this->email; }
	public function get_name(): string { return $this->name; }

	public function __construct(string $email, string $name) {
		$this->email = $email;
		$this->name = $name;
	}

    /**
     * @param PDO $db
     * @return StudentSectionData[]
     */
	public function fetch_sections(PDO $db, int $semester_id): array {
        $sql = "
            SELECT gss.sectionNumber, email, courseDataJSON
            FROM GradStudentSections gss 
            INNER JOIN SemesterSections SS on gss.sectionNumber = SS.sectionNumber
            WHERE email = :email AND SS.semesterId = :semester_id
        ";
        $stmt = $db->prepare($sql);
        $return_arr = [];
        if ($stmt && $stmt->execute([':email' => $this->email, ':semester_id' => $semester_id])){
            $rows = $stmt->fetchAll();
            foreach ($rows as $row){
                $return_arr[$row['sectionNumber']] = new StudentSectionData(json_decode($row['courseDataJSON'], true));
            }

            return $return_arr;
        } else {
            return [];
        }
    }
	// end public functions

}