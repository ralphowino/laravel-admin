module.exports = function (mix) {
    var themePath = '../themes/sbadmin';
    var vendorPath = '../vendor';

    mix
        .scripts([
            `${vendorPath}/metisMenu/metisMenu.js`,
            `${vendorPath}/flot/excanvas.js`,
            `${vendorPath}/raphael/raphael.min.js`,
            `${vendorPath}/morrisjs/morris.js`,

            `${themePath}/js/morris-data.js`,
            `${themePath}/js/sb-admin-2.min.js`
        ], 'public/js/sbadmin.js')
        .styles([
            `${vendorPath}/metisMenu/metisMenu.min.css`,
            `${themePath}/css/sb-admin-2.min.css`,

            `${vendorPath}/morrisjs/morris.css`
        ], 'public/css/sbadmin.css');
};