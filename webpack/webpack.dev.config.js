var webpack = require('webpack');
var path = require('path');
const root_path = 'C:\\Users\\tanderson\\Documents\\virtual-machines\\silhouette-main\\sync\\side-projects\\pc-jamiezvirzdin';

module.exports = {
    entry: [
        root_path + "\\game-plan.js"
    ],
    module: {
        rules: [{
            test: /\.(js|jsx)$/,
            exclude: /node_modules/,
            loader: 'babel-loader'
        },{
            test: /\.less$/,
            loaders: ["style-loader", "css-loader", "less-loader"]
        }
        ]
    },
    output: {
        path: root_path + "\\view\\public\\js",
        filename: 'game-plan.js'
    },
    devServer: {
        contentBase: __dirname + '/dist',
        historyApiFallback: true
    }
};