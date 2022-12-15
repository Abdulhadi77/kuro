<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    {{--    <div class="footer-newsletter">--}}
    {{--      <div class="container">--}}
    {{--        <div class="row justify-content-center">--}}
    {{--          <div class="col-lg-12 text-center">--}}
    {{--            <h4>Our Newsletter</h4>--}}
    {{--            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>--}}
    {{--          </div>--}}
    {{--          <div class="col-lg-6">--}}
    {{--            <form action="" method="post">--}}
    {{--              <input type="email" name="email"><input type="submit" value="Subscribe">--}}
    {{--            </form>--}}
    {{--          </div>--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--    </div>--}}

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info">
                    <a href="{{route('home')}}" class="logo d-flex align-items-center">
                        <img src="storage/{{$settings->logo}}" alt="">
                        <span>KURO</span>
                    </a>
                    <br>
                    <p>KURO is a cryptocurrency that supports youth projects around the world and provides humanitarian and educational assistance to bring the world to a higher level of cooperation. KURO also aims to improve token utility by lunching ecosystem projects that help those in need to get life basics</p>
                    <div class="social-links mt-3">
                        @foreach ($socials as $social)
                            <a href="{{$social->link}}" class="{{$social->name}}"><img src="storage/{{$social->logo}}" width='30px'></a>
                        @endforeach


                    </div>
                </div>

                <div class="col-lg-3 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="/">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{route('blog')}}">Blogs</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{route('vote')}}">Vote To Earn</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{route('Beteam')}}">Be from our team</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{route('ICO')}}">ICO</a></li>
                    </ul>
                </div>


                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>

                        <strong>Email </strong> <a href="mailto:{{$settings->email}}" style = "color:black">
                            {{$settings->email}} </a> <br>
                    </p>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            All Rights Reserved
            Designed by <strong><span>{{$settings->sitename_en}}</span></strong> Team.<br>
            &copy;Copyright {{$settings->sitename_en}}.
        </div>

    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

<script>

    //var web3 = new Web3(window.ethereum);

    window.data = {!! json_encode(Auth::user()) !!};


    // alert(window.data);
    window.onload = async function () {
        var web3 = new Web3(window.ethereum);
        // alert(window.data);
        let tokenAddress = "0xA6fB39D69b09ECdc1a8b5f829DF11a40B7742603";
        // console.log(tokenAddress)
        if (window.data.eth_address != null){
            let walletAddress = window.data.eth_address;
            let minABI = [{"inputs":[],"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"spender","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"from","type":"address"},{"indexed":true,"internalType":"address","name":"to","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"inputs":[{"internalType":"address","name":"","type":"address"},{"internalType":"address","name":"","type":"address"}],"name":"allowance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"value","type":"uint256"}],"name":"approve","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"owner","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"","type":"address"}],"name":"balances","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"decimals","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"name","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"stateMutability":"view","type":"function"},{"inputs":[],"name":"totalSupply","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"stateMutability":"view","type":"function"},{"inputs":[{"internalType":"address","name":"to","type":"address"},{"internalType":"uint256","name":"value","type":"uint256"}],"name":"transfer","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"},{"inputs":[{"internalType":"address","name":"from","type":"address"},{"internalType":"address","name":"to","type":"address"},{"internalType":"uint256","name":"value","type":"uint256"}],"name":"transferFrom","outputs":[{"internalType":"bool","name":"","type":"bool"}],"stateMutability":"nonpayable","type":"function"}];

            let contract = new web3.eth.Contract(minABI,tokenAddress);
            kuro_balance = await contract.methods.balanceOf(walletAddress).call();
            kuro_balance = parseFloat(kuro_balance) / 1000000000;
            window.data.kuro_balance = kuro_balance;
            //kuro_balance = 70;


            //Save kuro_balance in DB

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData()
            var user_id =window.data.id;
            var balance = kuro_balance;
            formData.append('user_id', user_id);
            formData.append('balance', balance);
            $.ajax({
                url:'/user/add_balance',
                cache: false,
                processData: false,
                contentType: false,
                type: 'POST',
                data: formData,
                success: function (data) {

                }, error: function (reject) {
                }
            });

        }

    }

</script>
