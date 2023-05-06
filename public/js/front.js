
$(function(){


    // const moment = require('./moment')
    // const momentTz = require('./moment-timezone');
    /**
     * 
     * Step 1: create a functio that generate 4 random digits
     * Step 2: push the random digits to the array
     * Step 3: send data to db
     * Step 4: fetch the data and display every 5 mins
     * Step 5: check the current date/time
     * Step 6: stop the generate of random digits upon refresh
     */

     var randomNumber;
     var string = "";
     var numberOfRandomNumbers = 12;
     var wrp = '.circle-wrap';
     var methodPost = 'POST';
     var slot11 = $(wrp + ' .slots_item_11');
     let now = new Date();
     let d = now.toLocaleString([], { hour: '2-digit', minute: '2-digit' });
     var myTimeout;
     const timeFormat = 'HH:mm:ss';

    //  momentTz.tz.load({
    //     zones : [
    //         'America/Los_Angeles|PST PDT|80 70|0101|1Lzm0 1zb0 Op0',
    //         'America/New_York|EST EDT|50 40|0101|1Lz50 1zb0 Op0'
    //     ],
    //     links : ["America/Toronto|Canada/Eastern"],
    //     version : '2014e'
    // });
    var dt = new Date();

    var test = moment(dt).format('DD-MM-YYYY');
    console.log(test)
    setInterval(function(){
        var dt = new Date();
        var clock_time = dt.getHours() + ":" + dt.getMinutes();
        console.log(clock_time)
        // if ( clock_time === '8:0' ) {
        //     location.reload();
        //     callTime();
        // }
    },1000);//or every min, 60000

    // var pacific    = moment.tz("US/Pacific");
    var canada = momentTz.tz("Canada/Eastern").format(timeFormat); 

    console.log(canada);  

    // moment().tz("Canada/Eastern").format(timeFormat);

    function callTime(){
        // if ('08:43 AM' <= d && d <= '08:50 AM') {
            time.isBetween(moment('05:00:00', timeFormat), moment('11:59:59', timeFormat)) ||
            time.isSame(moment('05:00:00', timeFormat)) ||
            time.isSame(moment('11:59:59', timeFormat))
            makeZero();
            if($(wrp + ' .circle').find('span').length > 0){
                addSlots();
            }
        // }
    }
        
    function makeZero(){
        $(wrp).find('.circle').html('<span class="custom-loader"></span>');
    }

    function addSlots(){
        for (var i = 0; i < numberOfRandomNumbers; i++) {
            randomNumber = (Math.floor(Math.random() * 10000) + 10000).toString().substring(1); //Will generate random number between 1 and 1000
            string += randomNumber + ", ";
        }
        // var str = s2.substring(0, s2.length - 1);
        numberInterval(string);
    }

    function numberInterval(str){
        var s2 = str.split(', ');
        var rs = s2.filter(element => {
            return element !== '';
        });
        var counter = 0,
            timer = setInterval(function(){
            castNumber(rs[counter], counter);
            counter++;
            if (counter === rs.length) {
                clearInterval(timer);
            }
        }, 2000);
    }
    
    function castNumber(p1, count){
        var slot = $(wrp + ' .slots_item_' + count);
        var slot2 = slot.find('span');
        if(p1.length > 0 && slot2.hasClass('custom-loader')){
            slot.html('<span>' + p1 + '</span>');
        }

        if(!slot11.find('span').hasClass('custom-loader')){
            sendingData();
            fetchGrandP();
        }
    }

    function sendingData(){
        var slotSpan0 = $(wrp + ' .slots_item_0 > span').text();
        var slotSpan1 = $(wrp + ' .slots_item_1 > span').text();
        var slotSpan2 = $(wrp + ' .slots_item_2 > span').text();
        var slotSpan3 = $(wrp + ' .slots_item_3 > span').text();
        var slotSpan4 = $(wrp + ' .slots_item_4 > span').text();
        var slotSpan5 = $(wrp + ' .slots_item_5 > span').text();
        var slotSpan6 = $(wrp + ' .slots_item_6 > span').text();
        var slotSpan7 = $(wrp + ' .slots_item_7 > span').text();
        var slotSpan8 = $(wrp + ' .slots_item_8 > span').text();
        var slotSpan9 = $(wrp + ' .slots_item_9 > span').text();
        var slotSpan10 = $(wrp + ' .slots_item_10 > span').text();
        var slotSpan11 = $(wrp + ' .slots_item_11 > span').text();
        var _token = $('input[name="_token"]').val();

        
        var dataSP = {
            '_method': 'POST',   
            '_token': _token,
            'first_digit': slotSpan0,
            'second_digit': slotSpan1,
            'thrid_digit': slotSpan2,
            'fourth_digit': slotSpan3,
            'fifth_digit': slotSpan4,
            'six_digit': slotSpan5
        };

        var dataCP = {
            '_method': 'POST',   
            '_token': _token,
            'first_digit': slotSpan6,
            'second_digit': slotSpan7,
            'thrid_digit': slotSpan8,
            'fourth_digit': slotSpan9,
            'fifth_digit': slotSpan10,
            'six_digit': slotSpan11
        };

        savingSP(dataSP);
        savingCP(dataCP);
    }

    function savingSP(dta) {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: methodPost,
            url: '/special_prizes/store',
            data: dta,
            dataType: 'JSON',
            success: function(res){
                console.log(res)
            }
        });
    }

    function savingCP(dta) {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: methodPost,
            url: '/consolation_prizes/store',
            data: dta,
            dataType: 'JSON',
            success: function(res){
                console.log(res)
            }
        });
    }

    function fetchGrandP(){
        $.ajax({
            type: 'GET',
            url: '/fetchData',
            dataType: 'json',
            success: function(res){
                var first = res[1]['first_prize'];
                var second = res[1]['second_prize'];
                var third = res[1]['thrid_prize'];
                var args = [first, second, third];
                var comma = args.join(', ');

                var s2 = comma.split(', ');
                var rs = s2.filter(element => {
                    return element !== '';
                });
                var counter = 0,
                    timer = setInterval(function(){
                    castGnumber(rs[counter], counter);
                    counter++;
                    if (counter === rs.length) {
                        clearInterval(timer);
                    }
                }, 2000);
            }
        });
    }

    function castGnumber(g1, gcount){
        var slot = $( '.grand-win ' + wrp + ' .gslots_item_' + gcount);
        var slot2 = slot.find('span');
        if(g1.length > 0 && slot2.hasClass('custom-loader')){
            slot.html('<span>' + g1 + '</span>');
        }
    }

});