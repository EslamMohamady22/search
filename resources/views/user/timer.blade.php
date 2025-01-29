<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="_token" content="{{csrf_token()}}" />
        <title>Grocery Store</title>
        <script src="{{ asset('http://code.jquery.com/jquery-3.3.1.min.js')}}"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js')}}"></script>

        <title>Count Up Timer in JavaScript</title>
        {{-- <style>
            #count_up_timer{
        font-size: 110%;
        font-weight: bold;
        color: white;
        z-index: 500;
        background-color: none;
        margin-top: -20%;
        /* margin-left: -40%; */
        float: left;
    }
    #stop_count_up_timer{
        background-color:black;
        color:white
    }
        </style>
     --}}
    </head>
    <body onload="setInterval(myFunction2, 10000);">
        {{-- <input id="demoo" value="20" > --}}
        <div style="" id="count_up_timer">00:00:00</div>
    <div class="container">
        <div class="alert alert-success" style="display:none;"></div>
        <P style="color: red" id="listposts" ></P>
        <form  id="form1">



        </form>
        {{-- <button >Try it</button> --}}

        <script>
        function myFunction2() {
            $(document).ready(function () {
        $("#form1").submit();
    //    $("#form2").submit();
    });
        }
        </script>
    </div>


    <script>
        jQuery(document).ready(function(){
        jQuery('#form1').submit(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ url('/ajax') }}",
                method: 'post',
                data: {
                    // name: "eslam",
                    // email: "eslam",
                    // message_title: "eslam2",
                    // message: "eslam"
                },
                success: function(result){

                }});
            });
        });
    </script>



<script>
    var timerVariable = setInterval(countUpTimer, 1000);
    //var x = document.getElementById('demoo').value;
var totalSeconds = {{$sec}};

function countUpTimer() {
++totalSeconds;
var hour = Math.floor(totalSeconds / 3600);
var minute = Math.floor((totalSeconds - hour * 3600) / 60);
var seconds = totalSeconds - (hour * 3600 + minute * 60);
if(hour < 10)
hour = "0"+hour;
if(minute < 10)
minute = "0"+minute;
if(seconds < 10)
seconds = "0"+seconds;
document.getElementById("count_up_timer").innerHTML = hour + ":" + minute + ":" + seconds;
}
</script>

    </body>
</html>
