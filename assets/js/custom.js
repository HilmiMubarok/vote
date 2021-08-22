function showCount(classname, data) {
	// var tgl = new Date(data)
	simplyCountdown(classname, {
        year: data.getFullYear(), // required
        month: data.getMonth()+1, // required
        day: data.getDate(), // required
        hours: data.getHours(), // Default is 0 [0-23] integer
        minutes: data.getMinutes(), // Default is 0 [0-59] integer
        seconds: data.getSeconds(), // Default is 0 [0-59] integer
        words: { //words displayed into the countdown
            days: { singular: 'Hari', plural: 'Hari' },
            hours: { singular: 'Jam', plural: 'Jam' },
            minutes: { singular: 'Menit', plural: 'Menit' },
            seconds: { singular: 'Detik', plural: 'Detik' }
        },
        plural: false, //use plurals
        inline: false, //set to true to get an inline basic countdown like : 24 days, 4 hours, 2 minutes, 5 seconds
        inlineClass: 'simply-countdown-inline', //inline css span class in case of inline = true
        // in case of inline set to false
        enableUtc: false,
        onEnd: function () {
       
            endCount()
            // return;
        },
        refresh: 1000, //default refresh every 1s
        sectionClass: 'simply-section', //section css class
        amountClass: 'simply-amount', // amount css class
        wordClass: 'simply-word', // word css class
        zeroPad: false,
        countUp: false, // enable count up if set to true
    });
}

function endCount() {
	// console.log("END")
	var url = "http://localhost:8000/vote/hapus_waktu.php";
	$.ajax({
	    url : url,
	    type: "GET",
	    success: function (res) {
	        console.log(res)
	    }
	})
}

function showZeroCount(classname) {
    simplyCountdown(classname, {
        year: 0, // required
        month: 0, // required
        day: 0, // required
        hours: 0, // Default is 0 [0-23] integer
        minutes: 0, // Default is 0 [0-59] integer
        seconds: 0, // Default is 0 [0-59] integer
        words: { //words displayed into the countdown
            days: { singular: 'Hari', plural: 'Hari' },
            hours: { singular: 'Jam', plural: 'Jam' },
            minutes: { singular: 'Menit', plural: 'Menit' },
            seconds: { singular: 'Detik', plural: 'Detik' }
        },
        plural: false, //use plurals
        inline: false, //set to true to get an inline basic countdown like : 24 days, 4 hours, 2 minutes, 5 seconds
        inlineClass: 'simply-countdown-inline', //inline css span class in case of inline = true
        // in case of inline set to false
        enableUtc: false,
    
        refresh: 1000, //default refresh every 1s
        sectionClass: 'simply-section', //section css class
        amountClass: 'simply-amount', // amount css class
        wordClass: 'simply-word', // word css class
        zeroPad: false,
        countUp: false, // enable count up if set to true
    });
}