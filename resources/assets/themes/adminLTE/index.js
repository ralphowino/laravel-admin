module.exports = function (mix) {
    var themePath = '../themes/adminLTE';
    var vendorPath = '../vendor';
    var nodePath = '../../../node_modules';

    mix
        .scripts([
            `${vendorPath}/jquery-ui/jquery-ui.min.js`,
            `${vendorPath}/raphael/raphael.min.js`,
            `${vendorPath}/morrisjs/morris.js`,
            `${vendorPath}/sparkline/jquery.sparkline.min.js`,
            `${vendorPath}/jvectormap/jquery-jvectormap-1.2.2.min.js`,
            `${vendorPath}/jvectormap/jquery-jvectormap-world-mill-en.js`,
            `${vendorPath}/knob/jquery.knob.js`,
            `${vendorPath}/daterangepicker/daterangepicker.js`,
            `${vendorPath}/datepicker/bootstrap-datepicker.js`,
            `${vendorPath}/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js`,
            `${vendorPath}/slimScroll/jquery.slimscroll.min.js`,
            `${vendorPath}/fastclick/fastclick.js`,

            `${themePath}/js/app.min.js`,
            `${themePath}/js/pages/dashboard.js`,
            `${themePath}/js/demo.js`
        ], 'public/js/adminLTE.js')

        .styles([
            `${themePath}/css/AdminLTE.min.css`,
            `${themePath}/css/skins/_all-skins.min.css`,

            `${vendorPath}/iCheck/flat/blue.css`,
            `${vendorPath}/morris/morris.css`,
            `${vendorPath}/jvectormap/jquery-jvectormap-1.2.2.css`,
            `${vendorPath}/datepicker/datepicker3.css`,
            `${vendorPath}/daterangepicker/daterangepicker.css`,
            `${vendorPath}/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css`,
        ], 'public/css/adminLTE.css')

        .copy(`resources/assets/themes/adminLTE/img`, 'public/img/adminLTE/');
};