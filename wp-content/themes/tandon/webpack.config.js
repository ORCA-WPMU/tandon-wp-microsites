const ExtractTextPlugin = require("extract-text-webpack-plugin");
const webpack = require('webpack');
const path = require("path");
const bootstrapEntryPoints = require('./webpack.bootstrap.config');
const glob = require('glob');
const BrowserSyncPlugin       = require('browser-sync-webpack-plugin');

const isProd = process.env.NODE_ENV === 'production'; //true or false
const cssDev = [
    'style-loader',
    // 'css-loader',
    // 'sass-loader',
    'css-loader?sourceMap',
    'sass-loader?sourceMap',
    'import-glob-loader',
];
const cssProd = ExtractTextPlugin.extract({
    fallback: 'style-loader',
    use: [
            {
                loader: 'css-loader',
            },
            {
                loader: 'postcss-loader', // Run post css actions
                    options: {
                        plugins: function () { // post css plugins, can be exported to postcss.config.js
                            return [
                            require('precss'),
                            require('autoprefixer')
                            ];
                        }
                    }
            },
            {
                loader: 'sass-loader'
            },
            {
                loader: 'import-glob-loader'
            }
        ],
        publicPath: '../'
})
const cssConfig = isProd ? cssProd : cssDev;

const bootstrapConfig = isProd ? bootstrapEntryPoints.prod : bootstrapEntryPoints.dev;

module.exports = {
    entry: {
        app: './assets/app.js',
        bootstrap: bootstrapConfig
    },
    output: {
        path: path.resolve(__dirname, "public"),
        filename: '[name].bundle.js'
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: cssConfig
            },
            // {
            //     test: /\.mp4$/,
            //     use: [
            //         'file-loader?name=videos/[name].[ext]',
            //     ]
            // },
            {
                test: /\.js$/,
                exclude: /(node_modules|bower_components)/,
                loader: 'babel-loader',
                query: {
                    presets: ['es2015']
                }
            },
            {
                test: /\.(png|svg|jp?g|gif)$/i,
                loader: 'url-loader?limit=100000&name=images/[name].[ext]'
            },
            {
                test: /fonts\/.*\.(woff|woff2|eot|otf|ttf|svg)?(\?v=[0-9]\.[0-9]\.[0-9])?$/,
                loader: 'url-loader?limit=100000&name=fonts/[name].[ext]' },
        ]
    },
    // devServer: {
    //     contentBase: path.join(__dirname, "public"),
    //     compress: true,
    //     hot: true,
    //     open: true,
    //     // stats: 'errors-only'
    // },
    plugins: [
        new ExtractTextPlugin({
            filename: '/css/[name].css',
            disable: !isProd,
            allChunks: true
        }),
        new BrowserSyncPlugin({
            proxy: 'http://microsites.engineering.nyu.local',
            port: 7676,
            files: [
                '**/*.php'
            ],
            ghostMode: {
                clicks: false,
                location: false,
                forms: false,
                scroll: false
            },
            injectChanges: true,
            logFileChanges: true,
            logLevel: 'debug',
            logPrefix: 'wepback',
            notify: true,
            reloadDelay: 0
        }),
        new webpack.HotModuleReplacementPlugin(),
        new webpack.NamedModulesPlugin(),
        new webpack.ProvidePlugin({
            $: "jquery",
            jQuery: "jquery",
            "window.jQuery": "jquery",
            Tether: "tether",
            "window.Tether": "tether",
            Popper: ['popper.js', 'default'],
            Modal: 'exports-loader?Modal!bootstrap/js/dist/modal',
            Popover: 'exports-loader?Popover!bootstrap/js/dist/popover',
            Collapse: "exports-loader?Collapse!bootstrap/js/dist/collapse",
            Tab: 'exports-loader?Tab!bootstrap/js/dist/tab',
            Tooltip: "exports-loader?Tooltip!bootstrap/js/dist/tooltip",
            Scrollspy: "exports-loader?Scrollspy!bootstrap/js/dist/scrollspy",
            Util: "exports-loader?Util!bootstrap/js/dist/util"
        })
    ]
}