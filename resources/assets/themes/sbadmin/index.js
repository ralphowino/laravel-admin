module.exports = function (mix) {
    var themePath = '../themes/sbadmin';
    var vendorPath = '../vendor';

    mix
        .scripts([
            `${vendorPath}/metisMenu/metisMenu.js`,
            `${vendorPath}/flot/excanvas.js`,
            `${vendorPath}/raphael/raphael.min.js`,
            `${vendorPath}/morrisjs/morris.js`,
            `${vendorPath}/flot/jquery.flot.js`,
            `${vendorPath}/flot/jquery.flot.pie.js`,
            `${vendorPath}/flot/jquery.flot.resize.js`,
            `${vendorPath}/flot/jquery.flot.time.js`,
            `${vendorPath}/flot-tooltip/jquery.flot.tooltip.min.js`,
            `${vendorPath}/datatables/js/jquery.dataTables.min.js`,
            `${vendorPath}/datatables-plugins/dataTables.bootstrap.min.js`,

            //`${themePath}/js/flot-data.js`,
            `${themePath}/js/morris-data.js`,
            `${themePath}/js/sb-admin-2.min.js`
        ], 'public/js/sbadmin.js')
        .styles([
            `${vendorPath}/morrisjs/morris.css`,
            `${vendorPath}/metisMenu/metisMenu.min.css`,
            `${vendorPath}/datatables-plugins/dataTables.bootstrap.css`,
            `${vendorPath}/datatables-responsive/dataTables.responsive.css`,
            `${themePath}/css/sb-admin-2.min.css`,

        ], 'public/css/sbadmin.css');
};