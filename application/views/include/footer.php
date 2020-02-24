    <footer class="footer">
        <span class="pull-right">
            <font size ="2" >Renprogar - Kemhan TNI</font>
        </span>
        <font size ="2" >2017 Copyright @ Renprogar</font>
    </footer>
    
    <script type='text/javascript'>
        
        var IDLE_TIMEOUT = 30 * 60; //Minutes
        var _idleSecondsCounter = 0;
        document.onclick = function() {
            _idleSecondsCounter = 0;
        };
        document.onmousemove = function() {
            _idleSecondsCounter = 0;
        };
        document.onkeypress = function() {
            _idleSecondsCounter = 0;
        };

        var myInterval = window.setInterval(CheckIdleTime, 1000);

        function CheckIdleTime() {
            _idleSecondsCounter++;
            var oPanel = document.getElementById("SecondsUntilExpire");
            if (_idleSecondsCounter >= IDLE_TIMEOUT) {
                alert("Tidak ada aktivitas lebih dari 30 menit, sistem akan otomatis logout.");
                window.clearInterval(myInterval);
                document.location.href = "<?php echo base_url('login/logout'); ?>";
            }
        }

        $(document).ready(function() {
            $('[contenteditable="true"]').keypress(function(e) {
                var x = event.charCode || event.keyCode;
                if (isNaN(String.fromCharCode(e.which)) 
                    && x!=46 || x===32 || x===13 || (x===46 
                    && event.currentTarget.innerText.includes('.')) 
                ) 
                e.preventDefault();
            });
        });

    </script>