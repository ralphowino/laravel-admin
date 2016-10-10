module.exports = function (mix) {
    var themePath = '../themes/adminLTE';
    var vendorPath = '../vendor';
    var nodePath = '../../../node_modules';

    mix
        .scripts([
            `${vendorPath}/jquery-ui/jquery-ui.min.js`,
            `${vendorPath}/datatables/jquery.dataTables.min.js`,
            `${vendorPath}/datatables/dataTables.bootstrap.min.js`,
            `${vendorPath}/morrisjs/morris.js`,
            `${vendorPath}/raphael/raphael.min.js`,
            `${vendorPath}/chartjs/Chart.min.js`,
            `${vendorPath}/flot/jquery.flot.min.js`,
            `${vendorPath}/flot/jquery.flot.resize.min.js`,
            `${vendorPath}/flot/jquery.flot.pie.min.js`,
            `${vendorPath}/flot/jquery.flot.categories.min.js`,
            `${vendorPath}/sparkline/jquery.sparkline.min.js`,
            `${vendorPath}/jvectormap/jquery-jvectormap-1.2.2.min.js`,
            `${vendorPath}/jvectormap/jquery-jvectormap-world-mill-en.js`,
            `${vendorPath}/knob/jquery.knob.js`,
            `${vendorPath}/moment/moment.js`,
            `${vendorPath}/daterangepicker/daterangepicker.js`,
            `${vendorPath}/datepicker/bootstrap-datepicker.js`,
            `${vendorPath}/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js`,
            `${vendorPath}/slimScroll/jquery.slimscroll.min.js`,
            `${vendorPath}/fastclick/fastclick.js`,
            `${vendorPath}/fullcalendar/fullcalendar.min.js`,
            `${vendorPath}/ionslider/ion.rangeSlider.min.js`,
            `${vendorPath}/bootstrap-slider/bootstrap-slider.js`,
            `${vendorPath}/select2/select2.full.min.js`,
            `${vendorPath}/input-mask/jquery.inputmask.js`,
            `${vendorPath}/input-mask/jquery.inputmask.date.extensions.js`,
            `${vendorPath}/input-mask/input-mask/jquery.inputmask.extensions.js`,
            `${vendorPath}/bootstrap-colorpicker/js/bootstrap-colorpicker.js`,
            `${vendorPath}/bootstrap-timepicker/js/bootstrap-timepicker.min.js`,
            `${vendorPath}/iCheck/icheck.min.js`,
            `${themePath}/js/app.min.js`,
            `${themePath}/js/pages/dashboard.js`,
            `${themePath}/js/demo.js`
        ], 'public/js/adminLTE.js')

        .styles([
            `${vendorPath}/iCheck/flat/blue.css`,
            `${vendorPath}/fullcalendar/fullcalendar.min.css`,
            `${vendorPath}/fullcalendar/fullcalendar.print.css`,
            `${vendorPath}/morris/morris.css`,
            `${vendorPath}/jvectormap/jquery-jvectormap-1.2.2.css`,
            `${vendorPath}/datepicker/datepicker3.css`,
            `${vendorPath}/daterangepicker/daterangepicker.css`,
            `${vendorPath}/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css`,
            `${vendorPath}/ionslider/ion.rangeSlider.css`,
            `${vendorPath}/ionslider/ion.rangeSlider.skinNice.css`,
            `${vendorPath}/bootstrap-slider/slider.css`,
            `${vendorPath}/iCheck/all.css`,
            `${vendorPath}/bootstrap-colorpicker/css/colorpicker.css`,
            `${vendorPath}/bootstrap-timepicker/css/bootstrap-timepicker.min.css`,
            `${vendorPath}/select2/select2.min.css`,
            `${vendorPath}/iCheck/minimal/_all.css`,
            `${vendorPath}/iCheck/square/_all.css`,
            `${vendorPath}/iCheck/flat/_all.css`,
            `${vendorPath}/iCheck/line/_all.css`,
            `${vendorPath}/iCheck/polaris/polaris.css`,
            `${vendorPath}/iCheck/futurico/futurico.css`,

            `${themePath}/css/AdminLTE.min.css`,
            `${themePath}/css/skins/_all-skins.min.css`
        ], 'public/css/adminLTE.css')

        .copy(`resources/assets/themes/adminLTE/img`, 'public/img/adminLTE/')
        .copy(`resources/assets/vendor/iCheck/skins`, 'public/css');


};