function GetHariLibur(menu) {
    var hasil = '';
    var jumlah = 0;
    $.ajax({
        url: "regonline/GetHariLibur",
        data: {
            "jumlahhari": 7 + daycount()
        },
        method: "POST",
        async: false,
        dataType: 'json',
        success: function (data) {
            hasil = data;
            jumlah = hasil.length;
        },
        error: function () {
            message('error', 'Server gangguan, silahkan ulangi kembali.', 'Peringatan', false);
        }
    });

    if (menu == '0') {
        $("#tglperiksacari").flatpickr({
            enableTime: false,
            dateFormat: "d-m-Y",
            minDate: new Date().fp_incr(daystart()),
            maxDate: new Date().fp_incr(7 + jumlah), // 7 days from now
            onOpen: function (selectedDates, dateStr, instance) {
                instance.setDate(instance.input.value, false);
            },
            "disable": hasil,
            "locale": {
                "firstDayOfWeek": 1 // set start day of week to Monday
            }
        });
        document.getElementById("tglperiksacari").value = daystarttgl();
    } else {
        $("#tglregistrasi").flatpickr({
            enableTime: false,
            dateFormat: "d-m-Y",
            minDate: new Date().fp_incr(daystart()),
            maxDate: new Date().fp_incr(7 + jumlah), // 7 days from now
            onOpen: function (selectedDates, dateStr, instance) {
                instance.setDate(instance.input.value, false);
            },
            "disable": hasil,
            "locale": {
                "firstDayOfWeek": 1 // set start day of week to Monday
            }
        });

        $("#tglregistrasi2").flatpickr({
            enableTime: false,
            dateFormat: "d-m-Y",
            minDate: new Date().fp_incr(daystart()),
            maxDate: new Date().fp_incr(7 + jumlah), // 7 days from now
            onOpen: function (selectedDates, dateStr, instance) {
                instance.setDate(instance.input.value, false);
            },
            "disable": hasil,
            "locale": {
                "firstDayOfWeek": 1 // set start day of week to Monday
            }
        });

        $("#tglregistrasi3").flatpickr({
            enableTime: false,
            dateFormat: "d-m-Y",
            minDate: new Date().fp_incr(daystart()),
            maxDate: new Date().fp_incr(7 + jumlah), // 7 days from now
            onOpen: function (selectedDates, dateStr, instance) {
                instance.setDate(instance.input.value, false);
            },
            "disable": hasil,
            "locale": {
                "firstDayOfWeek": 1 // set start day of week to Monday
            }
        });
        document.getElementById("tglregistrasi").value = daystarttgl();
        document.getElementById("tglregistrasi2").value = daystarttgl();
        document.getElementById("tglregistrasi3").value = daystarttgl();
    }


}