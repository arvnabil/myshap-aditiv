{{-- <!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
  <div class="bg-[url('https://cdn.pixabay.com/photo/2020/01/29/20/24/building-4803602_1280.jpg')] bg-center bg-cover h-screen">
        <div class='md:flex md:justify-between py-4 px-10'>
            <div class="md:ml-8 ml-0 flex justify-between items-center">
              <div class='text-2xl font-bold text-white py-2'>
                    {{ env('APP_NAME') }}
              </div>
              <span class="text-3xl text-white cursor-pointer mx-2 md:hidden block">
                <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
              </span>
            </div>

            <ul id="navbar" class='md:flex md:items-center z-[10] absolute md:z-auto md:static w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500 bg-slate-200 md:bg-transparent md:text-white'>
                <li class="hover:bg-slate-400 w-26 py-2 px-2 mx-2 rounded-full duration-500">Home</li>
                <li class="hover:bg-slate-400 w-26 py-2 px-2 mx-2 rounded-full duration-500">About</li>
            </ul>
       </div>

            <div class="flex flex-col absolute top-20 left-[50%] translate-x-[-50%] text-center">
              <h1 class="text-[40px] text-white m-auto font-bold">{{ env('APP_NAME') }}
              </h1>
              <p class="whitespace-nowrap pt-1 text-[16px] text-gray-200">
                  System Human resource
                  <span class="underline underline-offset-4 hover:decoration-2 cursor-pointer">
                      ACTiV Portal
                  </span>
              </p>
            </div>

          <div class="md:space-x-4 absolute bottom-[80px] left-[50%] translate-x-[-50%]">
                <a class="mt-2 md:mt-0 uppercase bg-slate-200 rounded-full text-gray-900 w-96 h-10 md:w-60 p-6" style="padding-left:50px;padding-right:50px;font-weight:bold;font-size:22px" href="{{ route('filament.employee.auth.login')}}">Login</a>
          </div>

          <div class="absolute left-[50%] translate-x-[-50%] bottom-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 animate-bounce" viewBox="0 0 20 20"
                  fill="currentColor">
                  <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd" />
              </svg>
          </div>
  </div>
  <script>
     function Menu(e) {
            let list = document.querySelector('ul');
            e.name === 'menu' ? (e.name = "close", list.classList.add('top-[80px]'), list.classList.add('opacity-100')) : (e.name = "menu", list.classList.remove('top-[80px]'), list.classList.remove('opacity-100'))
        }

    //register click
    const navbarLinks = document.querySelectorAll("#navbar li");

    navbarLinks.forEach((li) => {
        li.addEventListener("click", (e) => {
            e.preventDefault();

            const link = li.querySelector("a");
                const targetId = link.getAttribute("href").substring(1); // Mengambil ID target
                console.log(targetId);
                const targetSection = document.getElementById(targetId);

                if (targetSection) {
                    const yOffset = targetSection.getBoundingClientRect().top;
                    window.scrollBy({
                        top: yOffset,
                        behavior: 'smooth' // Menambahkan efek animasi
                    });
                }
        });
    });
  </script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="id-ID">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal My SHAP</title>
    <meta name="description" content="">
    {{-- @vite('resources/css/app.css') --}}
    <link rel="icon" href="{{ asset('images/favicon-asset.ico/favicon-16x16.png') }}" type="image/png" sizes="16x16">
    <link rel="icon" href="{{ asset('images/favicon-asset.ico/favicon-32x32.png') }}" type="image/png" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon-asset.ico/apple-icon-180x180.png') }}" sizes="180x180">
    <link rel="stylesheet" href="{{ asset('welcome/style.css') }}">
    <noscript>
        <style>
            @keyframes pulse {}.animated {  animation-play-state: running !important;}
        </style>
    </noscript>
    <script nonce="a5aaf8d7-92f6-4ea7-8e55-8d034d24b8ff" src="{{asset('welcome/js/script.js')}}">


    </script>
    <script nonce="a5aaf8d7-92f6-4ea7-8e55-8d034d24b8ff">
        window.C_CAPTCHA_IMPLEMENTATION = 'RECAPTCHA';
    </script>
    <script nonce="a5aaf8d7-92f6-4ea7-8e55-8d034d24b8ff">
        window.C_CAPTCHA_KEY = '6Ldk59waAAAAAMPqkICbJjfMivZLCGtTpa6Wn6zO';
    </script>
</head>

<body style="background-image: linear-gradient(to right, #13072e, #f87d2d">
    <div id="root">
        <a id="page-1" aria-hidden="true" style="visibility:hidden;"></a>
        <section id="CcFH3TCDgjPdxLXY" style="position:relative;overflow:hidden;display:grid;align-items:center;grid-template-columns:auto 100rem auto;z-index:0;">
            <div id="Iv2kg1olIj23UT73" style="grid-area:1 / 1 / 2 / 4;display:grid;position:absolute;min-height:100%;min-width:100%;">
                <div id="CQq8tES7HDk92za4" style="z-index:0;">
                    <div id="ifhjwr5gHT7LearY" style="box-sizing:border-box;width:100%;height:100%;transform:rotate(0deg);">
                        <div id="EbfTaVxmxxMsNUYk" style="width:100%;height:100%;opacity:1.0;">
                            <div id="vznc5T3fV7b2fSOK" style="transform:scale(1, 1);width:100%;height:100%;overflow:hidden;position:relative;">
                                {{-- <svg id="LRV197jMqjxRgr7p" viewBox="0 0 1366.0 768.0" preserveAspectRatio="none" style="width:100%;height:100%;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                    <defs>
                                        <linearGradient id="KmxAIrfL7z5Una86" gradientUnits="userSpaceOnUse" x1="0" y1="384" x2="1366" y2="384">
                                            <stop offset="0%" stop-color="#13072e" stop-opacity="1"></stop>
                                            <stop offset="100%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                        </linearGradient>
                                    </defs>
                                    <rect id="Ut0nE8UtGJD9jyui" width="1366" height="768" style="fill:url(index.html#KmxAIrfL7z5Una86);"></rect>
                                </svg> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mu7YTvQhgPitqqo9" style="display:grid;position:relative;grid-area:1 / 2 / 2 / 3;">
                <div id="A28MXxCiED40RaEJ" style="z-index:19;">
                    <div id="qGLghmd76vWNqfau" style="box-sizing:border-box;width:100%;height:100%;transform:rotate(0deg);">
                        <div id="Atnc7PG9aot38fD9" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                            <a href="{{ url('/') }}" id="rhp8qf7ARvI3tRZ1" style="color:#ffffff;font-family:YAFdtQJYB9w-1;line-height:1.38070911em;"><span id="IO2tpAaJ1kXTAb6G" style="color:#ffffff;font-weight:700;">
                                <img src="{{ asset('images/logo-light.svg') }}" alt="Logo" srcset="{{ asset('images/logo-light.svg') }}" height="50">
                            </span>
                                <br>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="e1ShGno6IjWyiFZP">
                    <div id="QAjmHXI0SP0Tt3CT" style="display:grid;position:relative;">
                        <div id="AJX2Kob00DcxnvRz" style="z-index:16;">
                            <div id="bdvFWyDWLbbcGaNd" style="box-sizing:border-box;width:100%;height:100%;transform:rotate(0deg);">
                                <div id="LbTtuwiZkW3liy24" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                    <p id="ww5E8HOQKENJrx0U" style="color:#ffffff;font-family:YAFdtQJYB9w-1;line-height:1.38070911em;text-align:center;"><a id="TJZadKSBvLj9FF20" href="#page-1" style="color:#ffffff;font-weight:700;pointer-events:all;" target="_self">Home</a>
                                        <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="onILzyGr8dbejZwB" style="z-index:17;">
                            <div id="FIatCNpfJOZK0V8f" style="box-sizing:border-box;width:100%;height:100%;transform:rotate(0deg);">
                                <div id="AB76GQzqk98kddNT" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                    <p id="o9VDV9bBz0S2CGeu" style="color:#ffffff;font-family:YAFdtQJYB9w-1;line-height:1.38070911em;text-align:center;"><a id="rOQNO5K4ioiDsgIn" href="#page-2" style="color:#ffffff;pointer-events:all;" target="_self">Fitur</a>
                                        <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div id="FeV0qGQS7NqPHf0c" style="z-index:18;">
                            <div id="asov2sQw6cPNmBG5" style="box-sizing:border-box;width:100%;height:100%;transform:rotate(0deg);">
                                <div id="vqcNBe7Wq2Fq3Fk3" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                    <p id="E9EiyljwCIlZmWj4" style="color:#ffffff;font-family:YAFdtQJYB9w-1;line-height:1.38070911em;text-align:center;"><a id="dDWhcdlhybqKRuyr" href="#page-3" style="color:#ffffff;">Pa​nduan</a>
                                        <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               @auth
                    <div id="z4wfX0d7vLNi7PJK">
                        <a href="{{ route('filament.employee.pages.dashboard-employee') }}" id="BdyzGflyVBjSla4H" style="display:grid;position:relative;">
                            <div id="ODAWhecSgODmJdQl" style="display:grid;position:relative;grid-area:2 / 2 / 3 / 3;">
                                <div id="adpy5lSnVIYRMnro" style="z-index:13;">
                                    <div id="BDJKN1Hr1yIvK7Ao" style="box-sizing:border-box;width:100%;height:100%;transform:rotate(0deg);">
                                        <svg id="fX5v24pn6szT4A0y" viewBox="0 0 64.0 64.0" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                            <g id="uSBgHskvmMHCk9PG" style="transform:scale(1, 1);">
                                                <path id="XQn1539WKsHQueD0" d="M32,0 C14.32688808,0 0,14.32688808 0,32 C0,49.67311096 14.32688808,64 32,64 C49.67311096,64 64,49.67311096 64,32 C64,14.32688808 49.67311096,0 32,0 Z" style="fill:#ffffff;opacity:1.0;"></path>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                                <div id="f0bOPmITHRx9ZaQT" style="z-index:14;">
                                    <div id="TCObBo34hJxZxtaG" style="padding-top:100%;transform:rotate(0deg);">
                                        <div id="YXV56ueDacOF7teR" style="position:absolute;top:0px;left:0px;width:100%;height:100%;">
                                            <svg id="zJV7h0ZSRe8rilpL" viewBox="0 0 64.0 64.0" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <g id="f1auZ0fGQgFQutWu" style="transform:scale(1, 1);">
                                                    <g id="LnxtAgXUGrg1LsRp" style="clip-path:url(index.html#NmPd1l0vY0HTygqu);">
                                                        <clipPath id="NmPd1l0vY0HTygqu">
                                                            <path d="M32,0 C14.32688808,0 0,14.32688808 0,32 C0,49.67311096 14.32688808,64 32,64 C49.67311096,64 64,49.67311096 64,32 C64,14.32688808 49.67311096,0 32,0 Z"></path>
                                                        </clipPath>
                                                        <path id="D4QAmOCmxDiiNrY8" d="M32,0 C14.32688808,0 0,14.32688808 0,32 C0,49.67311096 14.32688808,64 32,64 C49.67311096,64 64,49.67311096 64,32 C64,14.32688808 49.67311096,0 32,0 Z" style="fill:#ffffff;opacity:1.0;"></path>
                                                        <foreignObject id="Os79iTs9ynyecGKQ" style="width:64px;height:64px;">
                                                            <div id="jpMZNQBjZX30zE0c" style="clip-path:path('M32,0 C14.32688808,0 0,14.32688808 0,32 C0,49.67311096 14.32688808,64 32,64 C49.67311096,64 64,49.67311096 64,32 C64,14.32688808 49.67311096,0 32,0 Z');">
                                                                <div id="Dr77PazWkvGWshWx" style="transform:scale(1, 1);transform-origin:32px 32px;">
                                                                    <img src="{{ asset('welcome/images/fc09b7bca8aaaf376c5d8c1bb75a142b.jpg') }}" alt="He's got an impressive business profile" loading="lazy" style="transform:translate(0px, -4.10719323px) rotate(0deg);transform-origin:32px 36.10719323px;width:64px;height:72.21438646px;display:block;opacity:1.0;object-fit:fill;"/>
                                                                </div>
                                                            </div>
                                                        </foreignObject>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
               @endauth
                <div id="qPnlcKBobRMecJju">
                    <div id="LrJ1ezBOS4eSPsHL" style="display:grid;position:relative;">
                        <div id="wWXfadBvNjgGRUsh" style="display:grid;position:relative;grid-area:2 / 2 / 3 / 3;">
                            <div id="Q3PaHwKCOk2A9m1I" style="z-index:2;">
                                <div id="GpMXXi99K7UKywoN" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-86f7b73c-7ec1-4269-806c-dea2be2233b2 925ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <svg id="qVnsCJ1yd455bCqy" viewBox="0 0 314.1461 158.2296" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <g id="zzhqChX9nT9gJIyA" style="transform:scale(1, 1);">
                                                    <g id="eQW9bF8986EtS8Pn" style="clip-path:url(index.html#to0crW4bB7HnFMIU);">
                                                        <clipPath id="to0crW4bB7HnFMIU">
                                                            <path d="M6.34818217,0 L307.79790547,0 C309.48154807,0 311.09623304,0.66882441 312.28674814,1.85933951 313.47726323,3.0498546 314.14608765,4.66453958 314.14608765,6.34818217 L314.14608765,151.88141683 C314.14608765,153.56505942 313.47726323,155.1797444 312.28674814,156.37025949 311.09623304,157.56077459 309.48154806,158.229599 307.79790547,158.229599 L6.34818217,158.229599 C4.66453958,158.229599 3.04985461,157.56077459 1.85933951,156.37025949 0.66882442,155.1797444 0,153.56505942 0,151.88141683 L0,6.34818217 C0,4.66453958 0.66882441,3.04985461 1.85933951,1.85933951 3.0498546,0.66882442 4.66453958,0 6.34818217,0 Z"></path>
                                                        </clipPath>
                                                        <path id="hKuDhfmHmuJm8hKv" d="M6.34818217,0 L307.79790547,0 C309.48154807,0 311.09623304,0.66882441 312.28674814,1.85933951 313.47726323,3.0498546 314.14608765,4.66453958 314.14608765,6.34818217 L314.14608765,151.88141683 C314.14608765,153.56505942 313.47726323,155.1797444 312.28674814,156.37025949 311.09623304,157.56077459 309.48154806,158.229599 307.79790547,158.229599 L6.34818217,158.229599 C4.66453958,158.229599 3.04985461,157.56077459 1.85933951,156.37025949 0.66882442,155.1797444 0,153.56505942 0,151.88141683 L0,6.34818217 C0,4.66453958 0.66882441,3.04985461 1.85933951,1.85933951 3.0498546,0.66882442 4.66453958,0 6.34818217,0 Z"
                                                        style="fill:#ffffff;opacity:1.0;"></path>
                                                        <path id="w3LL89Thvm4zQzJz" d="M6.34818217,0 L307.79790547,0 C309.48154807,0 311.09623304,0.66882441 312.28674814,1.85933951 313.47726323,3.0498546 314.14608765,4.66453958 314.14608765,6.34818217 L314.14608765,151.88141683 C314.14608765,153.56505942 313.47726323,155.1797444 312.28674814,156.37025949 311.09623304,157.56077459 309.48154806,158.229599 307.79790547,158.229599 L6.34818217,158.229599 C4.66453958,158.229599 3.04985461,157.56077459 1.85933951,156.37025949 0.66882442,155.1797444 0,153.56505942 0,151.88141683 L0,6.34818217 C0,4.66453958 0.66882441,3.04985461 1.85933951,1.85933951 3.0498546,0.66882442 4.66453958,0 6.34818217,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#8d88a2;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg id="Kngi41g4sSTjqobc" viewBox="0 0 243.7702 256.0733" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <g id="xa8JYvN6JYlBRlKK" style="transform:scale(1, 1);">
                                                    <g id="x0GMc6z9LN7SC7ip" style="clip-path:url(index.html#xAxWi1mWnjzdybBG);">
                                                        <clipPath id="xAxWi1mWnjzdybBG">
                                                            <path d="M4.9260444,0 L238.84412771,0 C240.15059592,0 241.40355459,0.51899247 242.32736712,1.442805 243.25117965,2.36661753 243.77017212,3.61957619 243.77017212,4.9260444 L243.77017212,251.1472283 C243.77017212,252.45369651 243.25117965,253.70665518 242.32736712,254.63046771 241.40355459,255.55428024 240.15059592,256.07327271 238.84412771,256.07327271 L4.9260444,256.07327271 C3.6195762,256.07327271 2.36661753,255.55428023 1.442805,254.6304677 0.51899247,253.70665518 0,252.45369651 0,251.1472283 L0,4.9260444 C0,3.6195762 0.51899247,2.36661753 1.442805,1.442805 2.36661753,0.51899247 3.61957619,0 4.9260444,0 Z"></path>
                                                        </clipPath>
                                                        <path id="AfF3VSHdW54gqtJ1" d="M4.9260444,0 L238.84412771,0 C240.15059592,0 241.40355459,0.51899247 242.32736712,1.442805 243.25117965,2.36661753 243.77017212,3.61957619 243.77017212,4.9260444 L243.77017212,251.1472283 C243.77017212,252.45369651 243.25117965,253.70665518 242.32736712,254.63046771 241.40355459,255.55428024 240.15059592,256.07327271 238.84412771,256.07327271 L4.9260444,256.07327271 C3.6195762,256.07327271 2.36661753,255.55428023 1.442805,254.6304677 0.51899247,253.70665518 0,252.45369651 0,251.1472283 L0,4.9260444 C0,3.6195762 0.51899247,2.36661753 1.442805,1.442805 2.36661753,0.51899247 3.61957619,0 4.9260444,0 Z"
                                                        style="fill:#ffffff;opacity:1.0;"></path>
                                                        <path id="TovvdlufOX5AL8xf" d="M4.9260444,0 L238.84412771,0 C240.15059592,0 241.40355459,0.51899247 242.32736712,1.442805 243.25117965,2.36661753 243.77017212,3.61957619 243.77017212,4.9260444 L243.77017212,251.1472283 C243.77017212,252.45369651 243.25117965,253.70665518 242.32736712,254.63046771 241.40355459,255.55428024 240.15059592,256.07327271 238.84412771,256.07327271 L4.9260444,256.07327271 C3.6195762,256.07327271 2.36661753,255.55428023 1.442805,254.6304677 0.51899247,253.70665518 0,252.45369651 0,251.1472283 L0,4.9260444 C0,3.6195762 0.51899247,2.36661753 1.442805,1.442805 2.36661753,0.51899247 3.61957619,0 4.9260444,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#8d88a2;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg id="UjcT1piC8x2P2sQD" viewBox="0 0 178.7648 256.0733" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <g id="DzDpUWXNH9qqFHPk" style="transform:scale(1, 1);">
                                                    <g id="ZReC6I11ArJOoWNa" style="clip-path:url(index.html#ODYK9l84ZIsAWGBu);">
                                                        <clipPath id="ODYK9l84ZIsAWGBu">
                                                            <path d="M3.61243229,0 L175.15236873,0 C176.11044534,0 177.02928163,0.38059445 177.70674411,1.05805692 178.38420658,1.73551939 178.76480103,2.65435568 178.76480103,3.61243229 L178.76480103,252.46084041 C178.76480103,253.41891703 178.38420658,254.33775332 177.70674411,255.01521579 177.02928163,255.69267826 176.11044534,256.07327271 175.15236873,256.07327271 L3.61243229,256.07327271 C2.65435568,256.07327271 1.73551939,255.69267825 1.05805692,255.01521578 0.38059445,254.33775331 0,253.41891702 0,252.46084041 L0,3.61243229 C0,2.65435568 0.38059445,1.73551939 1.05805692,1.05805692 1.73551939,0.38059445 2.65435568,0 3.61243229,0 Z"></path>
                                                        </clipPath>
                                                        <path id="T838xkfvu2qTZKTG" d="M3.61243229,0 L175.15236873,0 C176.11044534,0 177.02928163,0.38059445 177.70674411,1.05805692 178.38420658,1.73551939 178.76480103,2.65435568 178.76480103,3.61243229 L178.76480103,252.46084041 C178.76480103,253.41891703 178.38420658,254.33775332 177.70674411,255.01521579 177.02928163,255.69267826 176.11044534,256.07327271 175.15236873,256.07327271 L3.61243229,256.07327271 C2.65435568,256.07327271 1.73551939,255.69267825 1.05805692,255.01521578 0.38059445,254.33775331 0,253.41891702 0,252.46084041 L0,3.61243229 C0,2.65435568 0.38059445,1.73551939 1.05805692,1.05805692 1.73551939,0.38059445 2.65435568,0 3.61243229,0 Z"
                                                        style="fill:#ffffff;opacity:1.0;"></path>
                                                        <path id="gDV0ZdmEeukefK5A" d="M3.61243229,0 L175.15236873,0 C176.11044534,0 177.02928163,0.38059445 177.70674411,1.05805692 178.38420658,1.73551939 178.76480103,2.65435568 178.76480103,3.61243229 L178.76480103,252.46084041 C178.76480103,253.41891703 178.38420658,254.33775332 177.70674411,255.01521579 177.02928163,255.69267826 176.11044534,256.07327271 175.15236873,256.07327271 L3.61243229,256.07327271 C2.65435568,256.07327271 1.73551939,255.69267825 1.05805692,255.01521578 0.38059445,254.33775331 0,253.41891702 0,252.46084041 L0,3.61243229 C0,2.65435568 0.38059445,1.73551939 1.05805692,1.05805692 1.73551939,0.38059445 2.65435568,0 3.61243229,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#8d88a2;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg id="DXWi94JmtEqNUh87" viewBox="0 0 113.7594 208.2241" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <g id="yZSKYq2xpU2piZpY" style="transform:scale(1, 1);">
                                                    <g id="LyjRVohHk9J1RXax" style="clip-path:url(index.html#G22yZpkBGey6KwOS);">
                                                        <clipPath id="G22yZpkBGey6KwOS">
                                                            <path d="M2.29882018,0 L111.46059449,0 C112.07027951,0 112.65499342,0.24219643 113.08610583,0.67330884 113.51721824,1.10442125 113.75941467,1.68913516 113.75941467,2.29882018 L113.75941467,205.92530091 C113.75941467,206.53498593 113.51721824,207.11969984 113.08610583,207.55081225 112.65499342,207.98192466 112.07027951,208.22412109 111.46059449,208.22412109 L2.29882018,208.22412109 C1.68913516,208.22412109 1.10442125,207.98192466 0.67330884,207.55081225 0.24219643,207.11969984 0,206.53498593 0,205.92530091 L0,2.29882018 C0,1.68913516 0.24219643,1.10442126 0.67330884,0.67330884 1.10442125,0.24219643 1.68913516,0 2.29882018,0 Z"></path>
                                                        </clipPath>
                                                        <path id="yLT1HdpuhIm3PJnX" d="M2.29882018,0 L111.46059449,0 C112.07027951,0 112.65499342,0.24219643 113.08610583,0.67330884 113.51721824,1.10442125 113.75941467,1.68913516 113.75941467,2.29882018 L113.75941467,205.92530091 C113.75941467,206.53498593 113.51721824,207.11969984 113.08610583,207.55081225 112.65499342,207.98192466 112.07027951,208.22412109 111.46059449,208.22412109 L2.29882018,208.22412109 C1.68913516,208.22412109 1.10442125,207.98192466 0.67330884,207.55081225 0.24219643,207.11969984 0,206.53498593 0,205.92530091 L0,2.29882018 C0,1.68913516 0.24219643,1.10442126 0.67330884,0.67330884 1.10442125,0.24219643 1.68913516,0 2.29882018,0 Z"
                                                        style="fill:#ffffff;opacity:1.0;"></path>
                                                        <path id="CLQ3oxUaOw3WiBKN" d="M2.29882018,0 L111.46059449,0 C112.07027951,0 112.65499342,0.24219643 113.08610583,0.67330884 113.51721824,1.10442125 113.75941467,1.68913516 113.75941467,2.29882018 L113.75941467,205.92530091 C113.75941467,206.53498593 113.51721824,207.11969984 113.08610583,207.55081225 112.65499342,207.98192466 112.07027951,208.22412109 111.46059449,208.22412109 L2.29882018,208.22412109 C1.68913516,208.22412109 1.10442125,207.98192466 0.67330884,207.55081225 0.24219643,207.11969984 0,206.53498593 0,205.92530091 L0,2.29882018 C0,1.68913516 0.24219643,1.10442126 0.67330884,0.67330884 1.10442125,0.24219643 1.68913516,0 2.29882018,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#8d88a2;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg id="CFxVAXLjYGVuJeSQ" viewBox="0 0 87.0971 174.0745" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <g id="nLor05ZIvuNDCIEv" style="transform:scale(1, 1);">
                                                    <g id="jyuj2CZdffwea7GR" style="clip-path:url(index.html#aMR8uMbKdX87UDSc);">
                                                        <clipPath id="aMR8uMbKdX87UDSc">
                                                            <path d="M1.7600354,0 L85.33701813,0 C85.80380854,0 86.25148043,0.18543177 86.58155109,0.51550243 86.91162176,0.8455731 87.09705353,1.29324499 87.09705353,1.7600354 L87.09705353,172.31450378 C87.09705353,173.28654449 86.30905884,174.07453918 85.33701813,174.07453918 L1.7600354,174.07453918 C1.29324499,174.07453919 0.8455731,173.88910742 0.51550243,173.55903675 0.18543177,173.22896608 0,172.78129419 0,172.31450378 L0,1.7600354 C0,1.29324499 0.18543177,0.8455731 0.51550243,0.51550243 0.8455731,0.18543177 1.29324499,0 1.7600354,0 Z"></path>
                                                        </clipPath>
                                                        <path id="TJSgCGWHAoylcmwH" d="M1.7600354,0 L85.33701813,0 C85.80380854,0 86.25148043,0.18543177 86.58155109,0.51550243 86.91162176,0.8455731 87.09705353,1.29324499 87.09705353,1.7600354 L87.09705353,172.31450378 C87.09705353,173.28654449 86.30905884,174.07453918 85.33701813,174.07453918 L1.7600354,174.07453918 C1.29324499,174.07453919 0.8455731,173.88910742 0.51550243,173.55903675 0.18543177,173.22896608 0,172.78129419 0,172.31450378 L0,1.7600354 C0,1.29324499 0.18543177,0.8455731 0.51550243,0.51550243 0.8455731,0.18543177 1.29324499,0 1.7600354,0 Z"
                                                        style="fill:#ffffff;opacity:1.0;"></path>
                                                        <path id="LTHtMPSqd0uzO3MU" d="M1.7600354,0 L85.33701813,0 C85.80380854,0 86.25148043,0.18543177 86.58155109,0.51550243 86.91162176,0.8455731 87.09705353,1.29324499 87.09705353,1.7600354 L87.09705353,172.31450378 C87.09705353,173.28654449 86.30905884,174.07453918 85.33701813,174.07453918 L1.7600354,174.07453918 C1.29324499,174.07453919 0.8455731,173.88910742 0.51550243,173.55903675 0.18543177,173.22896608 0,172.78129419 0,172.31450378 L0,1.7600354 C0,1.29324499 0.18543177,0.8455731 0.51550243,0.51550243 0.8455731,0.18543177 1.29324499,0 1.7600354,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#8d88a2;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="Od9zLxjIdZFZDCGx" style="display:grid;position:relative;">
                                <div id="olmvVYuxV2hIui3C" style="z-index:4;">
                                    <div id="JHVey4qzMl4PdFsC" style="box-sizing:border-box;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-4b28d172-5f4e-437d-a0b9-95a52f358e7c 925ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <svg id="dhrJGCdSMUudvXGv" viewBox="0 0 52.5278 10.7199" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                    <g id="rk4mYXqcEwyrvNrL" style="transform:scale(1, 1);">
                                                        <path id="Kh7MjMDnnyu7B7An" d="M5.35997486,0 L47.16777706,0 C50.12800944,0 52.52775192,2.39974249 52.52775192,5.35997486 L52.52775192,5.35997486 C52.52775192,6.78152858 51.96304191,8.14485916 50.95785163,9.15004943 49.95266136,10.15523971 48.58933078,10.71994972 47.16777706,10.71994972 L5.35997486,10.71994972 C3.93842114,10.71994972 2.57509056,10.15523971 1.56990029,9.15004943 0.56471001,8.14485916 0,6.78152858 0,5.35997486 L0,5.35997486 C0,3.93842114 0.56471002,2.57509056 1.56990029,1.56990029 2.57509056,0.56471002 3.93842114,0 5.35997486,0 Z"
                                                        style="fill:#f87d2d;opacity:1.0;"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="HNWu4S3VQuoD0LUC" style="z-index:10;">
                                    <div id="xE7ClqFhEBk1VvQp" style="box-sizing:border-box;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-7d6d9dc2-69cd-4067-ac0a-96bacccbd576 925ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <div id="U1hf3DfGC8GpajQL" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                    <p id="fMSPdf88GBPNeZ2n" style="color:#ffffff;font-family:YAFdtQJYB9w-1;line-height:1.37730507em;text-align:center;"><span id="G9G1MEGtaCGPPxQi" style="color:#ffffff;">#MakeITGrowth</span>
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="pq6QP5Kzm0fsbjn9" style="z-index:8;">
                                <div id="jLF7lzYN7wN73RtG" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-b5b50e6a-8831-4789-91c2-cef67a53a834 925ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="WxUqgL098rWzIUrd" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="eM5yxpSVgKcsHvTt" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.19028489em;"><span id="j2DafPajlEU3eX6h" style="color:#000000;font-weight:800;">Portal My SHAP</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="kei2joLWXpbFrnjc" style="z-index:9;">
                                <div id="mEBQHzJgbiqY8rTr" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-a1cc958f-efec-483e-b05a-38c189dd03e8 925ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="UFkzDDU5tc8XWfpU" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="V7vuS9kwJAeeSIct" style="color:#13072e;font-family:YAFdtQJYB9w-1;line-height:1.45312727em;"><span id="ARTRamHQdwDBQEq7" style="color:#13072e;">SHAP merupakan singkatan dari Sistem ​Human resource ADITIV Portal, merupakan ​platform untuk menginput semua data yang ​berhubungan dengan pekerjaan HR.</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a id="k756WFavxnshpBpW" rel="noopener" href="{{ route('filament.employee.auth.login') }}"  class="animation_container" style="display:grid;position:relative;cursor:pointer;font-weight:700;">
                                <div id="Ypn5af7GmDbhAqKQ" style="z-index:5;">
                                    <div id="bjt3gmtXZC62PdT5" style="box-sizing:border-box;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">

                                          <div class="rec-btn-rounded animated" style="height:100%;animation:rise-LEFT-7d381662-fa58-4145-aa22-33945a15dd99 925ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ZmllZgVIyezeGHKJ"  style="z-index:11;">
                                    <div id="ivhNrIwCJwyZy4My" style="box-sizing:border-box;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-c5ff8ca6-21dc-4856-b094-f5eb869da941 925ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <div id="OdsxsuqUFCC3Md7y" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                    <p id="CoJq5sV7kj7yVLbM" style="color:#ffffff;font-family:YAFdtQJYB9w-1;line-height:1.38368766em;text-align:center;">
                                                      <!-- <a id="nykjPogYInOxNkke" target="_blank" rel="noopener" href="#" style="color:#ffffff;font-weight:700;pointer-events:all;" data-interstitial-link=""> -->
                                                        Masuk Portal
                                                      <!-- </a> -->
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="dX7Ydl3br2UuJChb" style="display:grid;position:relative;grid-area:3 / 5 / 6 / 6;">
                                    <div id="Kqb6x89QjWnOxtat" style="z-index:6;">
                                        <div id="iDXpoGI6PqPir1r3" style="box-sizing:border-box;width:100%;height:100%;">
                                            <div class="animation_container" style="width:100%;height:100%;">
                                                <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-69a8cfad-07ea-47d5-8ae2-1cfd62567879 925ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                    <svg id="hFc06jAe4nKPUOwN" viewBox="0 0 64.0 64.0" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                        <g id="LWVd5R9Dn8ypVDyg" style="transform:scale(1, 1);">
                                                            <path id="PxAInQsuKvte4JAD" d="M32,0 C14.32688808,0 0,14.32688808 0,32 C0,49.67311096 14.32688808,64 32,64 C49.67311096,64 64,49.67311096 64,32 C64,14.32688808 49.67311096,0 32,0 Z" style="fill:#ffffff;opacity:1.0;"></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Jzv7fbFD0Gx4Qwll" style="z-index:7;">
                                        <div id="W4LnzWSq8C8nR5e9" style="padding-top:79.625%;">
                                            <div id="rvFp4XmuPEAPJTiG" style="position:absolute;top:0px;left:0px;width:100%;height:100%;">
                                                <div class="animation_container" style="width:100%;height:100%;">
                                                    <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-ad416dc2-b590-4ebc-ac66-7b473cc2430f 925ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                        <div id="EW59JDi95pGKhFKo" style="width:100%;height:100%;opacity:1.0;">
                                                            <div id="SDN2Xzk0JZaIHWYQ" style="transform:scale(1, 1);width:100%;height:100%;overflow:hidden;position:relative;">
                                                                <div id="UkkgbxKXg155sbVD" style="width:calc(100% * max(1, var(--scale-fill, 1)));height:calc(100% / min(1, var(--scale-fill, 1)));position:absolute;top:50%;left:50%;opacity:1.0;animation:pulse 1.5s ease-in-out infinite;"><img src="{{ asset('welcome/images/42dd86fb48d541b5daeb8735d89f01d8.svg') }}" alt="Black Basic Short Arrow Right" loading="lazy" style="width:100%;height:100%;display:block;object-fit:cover;object-position:50% 50%;transform:translate(-50%, -50%) rotate(0deg);"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div id="VUvNGRItARWSobCS" style="z-index:3;">
                                <div id="qTs07OvJRfK8WWRt" style="padding-top:93.1%;">
                                    <div id="CJQxAjsSTYVzGqbM" style="position:absolute;top:0px;left:0px;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-2a59dea9-d435-4646-9de5-6fa2e2655094 925ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <svg id="DyPtAbbOGmuDkONn" viewBox="0 0 500.0 465.5" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                    <g id="ATzqcv5Eo9kD95ze" style="transform:scale(1, 1);">
                                                        <foreignObject id="vOCCJNqHH2O0abHV" style="width:500px;height:465.5px;">
                                                            <div id="SLpXLbPwYdofBXMI" style="clip-path:path('M90.30000305,31.70000076 L8.60000038,172.6000061 C-5.39999962,196.70000648 -2,227.1000061 16.90000057,247.6000061 L198.8999939,445 C210.8999939,458.10000038 227.8999939,465.5 245.59999466,465.5 L436.29999161,465.5 C471.39999008,465.5 499.89999008,437 499.89999008,401.90000153 L499.89999008,148.90000153 C499.89999008,135.80000114 495.89999008,123.00000191 488.2999897,112.30000305 L428.2999897,27 C416.39999008,10.10000038 396.99999046,0 376.2999897,0 L145.30000305,0 C122.59999847,0 101.59999847,12.10000038 90.30000305,31.70000076 Z');">
                                                                <div id="yl75Vrg6Fdi8rfGI" style="transform:scale(1, 1);transform-origin:247px 233px;"><img src="{{asset('welcome/images/57eea4ea85e62338d60c92a47a4040d7.jpg')}}" alt="Working on Laptop Technology Communication Official Lifestyle" loading="lazy" srcset="{{ asset('welcome/images/52643c1d9745bf75fad5a5bdad09031d.jpg')}} 1200w, {{asset('welcome/images/57eea4ea85e62338d60c92a47a4040d7.jpg')}} 1800w"
                                                                    sizes="(max-width: 375px) 103.33497942vw, (min-width: 375.05px) and (max-width: 480px) 109.46502058vw, (min-width: 480.05px) and (max-width: 768px) 95.37824074vw, (min-width: 768.05px) and (max-width: 1024px) 71.53368056vw, (min-width: 1024.05px) 53.62407679vw"
                                                                    style="transform:translate(-78.43318627px, 0px) rotate(0deg);transform-origin:328.39506173px 232.75px;width:656.79012346px;height:465.5px;display:block;opacity:1.0;object-fit:fill;"></div>
                                                            </div>
                                                        </foreignObject>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <a id="page-2" aria-hidden="true" style="visibility:hidden;"></a>
        <section id="uESxIWOpPjTyQcQR" style="position:relative;overflow:hidden;display:grid;align-items:center;grid-template-columns:auto 100rem auto;z-index:0;margin-top:-1px;">
            <div id="zWQUXReGHqhHVrXV" style="grid-area:1 / 1 / 2 / 4;display:grid;position:absolute;min-height:100%;min-width:100%;">
                <div id="xQlls5gAYIIZihsu" style="z-index:0;">
                    <div id="rEz9BzzxmaxoP2rZ" style="box-sizing:border-box;width:100%;height:100%;transform:rotate(0deg);">
                        <div id="kcSJDQGCrbTx82Jt" style="width:100%;height:100%;opacity:1.0;">
                            <div id="xjBXFy1r28g5RA7e" style="transform:scale(1, 1);width:100%;height:100%;overflow:hidden;position:relative;">
                                {{-- <svg id="pKIusLaz9vlxkfG6" viewBox="0 0 1366.0 768.0" preserveAspectRatio="none" style="width:100%;height:100%;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                    <defs>
                                        <linearGradient id="KuOrLeYR4v4J8hol" gradientUnits="userSpaceOnUse" x1="0" y1="384" x2="1366" y2="384">
                                            <stop offset="0%" stop-color="#13072e" stop-opacity="1"></stop>
                                            <stop offset="100%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                        </linearGradient>
                                    </defs>
                                    <rect id="huTQThPysZbuKmRy" width="1366" height="768" style="fill:url(index.html#KuOrLeYR4v4J8hol);"></rect>
                                </svg> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ihnnBCTWk5GHQEbE" style="display:grid;position:relative;grid-area:1 / 2 / 2 / 3;">
                <div id="watTe5MkhimG95bk" style="z-index:6;">
                    <div id="YKsZdLvTbFfHdt6t" style="box-sizing:border-box;width:100%;height:100%;">
                        <div class="animation_container" style="width:100%;height:100%;">
                            <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-d2d0b850-2558-439f-8a7d-cbf87da10b99 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                <div id="BXjsxWBV561CS6bQ" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                    <p id="fkqwvqUSrXareWcM" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.19460754em;text-align:center;letter-spacing:-0.02em;"><span id="Z4MvYhHrCdlqJuEc" style="color:#ffffff;font-weight:800;">Fitur yang telah hadir</span>
                                        <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="nhpG34Gto4QrjEKV">
                    <div id="HBTHha6xYWVEhyiS" style="display:grid;position:relative;">
                        <div id="ZNqSx245X3osvrLR" style="display:grid;position:relative;">
                            <div id="i82VvIQXtnpLWqUH" style="z-index:8;">
                                <div id="NKhJtPc8zTShv9sq" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-08c93ea0-9b83-4d4f-85ec-cc024a49bf73 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <svg id="gtkGY0VfQlHObDcC" viewBox="0 0 101.3333 101.3727" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <defs>
                                                    <radialGradient id="Ddzj9Bl9ZKAH37sd" gradientUnits="userSpaceOnUse" cx="0" cy="0" r="144.24978336">
                                                        <stop offset="0%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                                        <stop offset="100%" stop-color="#ffffff" stop-opacity="1"></stop>
                                                    </radialGradient>
                                                </defs>
                                                <g id="v8dRJOg9BaLDV2Rz" style="transform:scale(1, 1);">
                                                    <g id="olkwUTPVTtKrhCrl" style="clip-path:url(index.html#wp9rsMTIN5IT6tR0);">
                                                        <clipPath id="wp9rsMTIN5IT6tR0">
                                                            <path d="M6.37124236,0 L94.96209352,0 C96.65185205,0 98.27240248,0.67125396 99.4672422,1.86609368 100.66208192,3.0609334 101.33333588,4.68148382 101.33333588,6.37124236 L101.33333588,95.00142305 C101.33333588,96.69118158 100.66208191,98.31173201 99.4672422,99.50657172 98.27240248,100.70141144 96.65185205,101.37266541 94.96209352,101.37266541 L6.37124236,101.37266541 C2.85250237,101.3726654 0,98.52016304 0,95.00142305 L0,6.37124236 C0,2.85250237 2.85250237,0 6.37124236,0 Z"></path>
                                                        </clipPath>
                                                        <path id="GNg1XIAPOAebOKUk" d="M6.37124236,0 L94.96209352,0 C96.65185205,0 98.27240248,0.67125396 99.4672422,1.86609368 100.66208192,3.0609334 101.33333588,4.68148382 101.33333588,6.37124236 L101.33333588,95.00142305 C101.33333588,96.69118158 100.66208191,98.31173201 99.4672422,99.50657172 98.27240248,100.70141144 96.65185205,101.37266541 94.96209352,101.37266541 L6.37124236,101.37266541 C2.85250237,101.3726654 0,98.52016304 0,95.00142305 L0,6.37124236 C0,2.85250237 2.85250237,0 6.37124236,0 Z"
                                                        fill="url(#Ddzj9Bl9ZKAH37sd)"></path>
                                                        <path id="VwrxvOz9gD4XhNIX" d="M6.37124236,0 L94.96209352,0 C96.65185205,0 98.27240248,0.67125396 99.4672422,1.86609368 100.66208192,3.0609334 101.33333588,4.68148382 101.33333588,6.37124236 L101.33333588,95.00142305 C101.33333588,96.69118158 100.66208191,98.31173201 99.4672422,99.50657172 98.27240248,100.70141144 96.65185205,101.37266541 94.96209352,101.37266541 L6.37124236,101.37266541 C2.85250237,101.3726654 0,98.52016304 0,95.00142305 L0,6.37124236 C0,2.85250237 2.85250237,0 6.37124236,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#8d88a2;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg id="kGIx0fO3IcK5ZmiI" viewBox="0 0 87.4135 110.236" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <defs>
                                                    <radialGradient id="nhQZ5u1jDeAxTbNt" gradientUnits="userSpaceOnUse" cx="0" cy="0" r="141.65097952">
                                                        <stop offset="0%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                                        <stop offset="100%" stop-color="#ffffff" stop-opacity="1"></stop>
                                                    </radialGradient>
                                                </defs>
                                                <g id="pXOS5UoZNhffSNPq" style="transform:scale(1, 1);">
                                                    <g id="hV6fEHZAhGm8VBBF" style="clip-path:url(index.html#ZBGU1LoQYNg3zADr);">
                                                        <clipPath id="ZBGU1LoQYNg3zADr">
                                                            <path d="M5.49604714,0 L81.91742789,0 C83.37507022,0 84.77301132,0.57904616 85.8037201,1.60975494 86.83442888,2.64046371 87.41347504,4.03840481 87.41347504,5.49604714 L87.41347504,104.73995292 C87.41347504,106.19759525 86.83442888,107.59553635 85.8037201,108.62624512 84.77301132,109.6569539 83.37507022,110.23600006 81.91742789,110.23600006 L5.49604714,110.23600006 C4.03840481,110.23600006 2.64046372,109.6569539 1.60975494,108.62624512 0.57904616,107.59553635 0,106.19759525 0,104.73995292 L0,5.49604714 C0,4.03840481 0.57904616,2.64046372 1.60975494,1.60975494 2.64046371,0.57904616 4.03840481,0 5.49604714,0 Z"></path>
                                                        </clipPath>
                                                        <path id="IAmeN9fBTGUSIkJX" d="M5.49604714,0 L81.91742789,0 C83.37507022,0 84.77301132,0.57904616 85.8037201,1.60975494 86.83442888,2.64046371 87.41347504,4.03840481 87.41347504,5.49604714 L87.41347504,104.73995292 C87.41347504,106.19759525 86.83442888,107.59553635 85.8037201,108.62624512 84.77301132,109.6569539 83.37507022,110.23600006 81.91742789,110.23600006 L5.49604714,110.23600006 C4.03840481,110.23600006 2.64046372,109.6569539 1.60975494,108.62624512 0.57904616,107.59553635 0,106.19759525 0,104.73995292 L0,5.49604714 C0,4.03840481 0.57904616,2.64046372 1.60975494,1.60975494 2.64046371,0.57904616 4.03840481,0 5.49604714,0 Z"
                                                        fill="url(#nhQZ5u1jDeAxTbNt)"></path>
                                                        <path id="trZ0sr7j6jQfA8PH" d="M5.49604714,0 L81.91742789,0 C83.37507022,0 84.77301132,0.57904616 85.8037201,1.60975494 86.83442888,2.64046371 87.41347504,4.03840481 87.41347504,5.49604714 L87.41347504,104.73995292 C87.41347504,106.19759525 86.83442888,107.59553635 85.8037201,108.62624512 84.77301132,109.6569539 83.37507022,110.23600006 81.91742789,110.23600006 L5.49604714,110.23600006 C4.03840481,110.23600006 2.64046372,109.6569539 1.60975494,108.62624512 0.57904616,107.59553635 0,106.19759525 0,104.73995292 L0,5.49604714 C0,4.03840481 0.57904616,2.64046372 1.60975494,1.60975494 2.64046371,0.57904616 4.03840481,0 5.49604714,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#8d88a2;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="AEMEEt7NutX1y5OJ" style="z-index:9;">
                                <div id="x9wsfhIZIGl60vmf" style="padding-top:96.75%;">
                                    <div id="L3gUYsqRWAx9w1eb" style="position:absolute;top:0px;left:0px;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-d60090f0-ae29-461f-93ad-dfe8c7ad0e63 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <div id="B4Vobv0wDjMo1eM4" style="width:100%;height:100%;opacity:1.0;">
                                                    <div id="c7U88iAz1fFvlCKP" style="transform:scale(1, 1);width:100%;height:100%;overflow:hidden;position:relative;">
                                                        <div id="Hn4PiAY9k5Z7j9ib" style="width:calc(100% * max(1, var(--scale-fill, 1)));height:calc(100% / min(1, var(--scale-fill, 1)));position:absolute;top:50%;left:50%;opacity:1.0;animation:pulse 1.5s ease-in-out infinite;"><img src="{{asset('welcome/images/2e75c43cdbdc8c19e076ee0ef350c3c4.svg')}}" alt="Productivity Flat Style Day Off" loading="lazy" style="width:100%;height:100%;display:block;object-fit:cover;object-position:50% 50%;transform:translate(-50%, -50%) rotate(0deg);"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="M8KPQWHWYFIE7mez" style="display:grid;position:relative;">
                                <div id="HsTZCTNkRMVQLXUl" style="z-index:10;">
                                    <div id="rrKgGGRWdiZr8MtC" style="box-sizing:border-box;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-0dafbde2-e10d-4f35-9f49-8cfc3dcbdc7b 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <svg id="Ex7xVALCw58xYuac" viewBox="0 0 36.1798 10.7199" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                    <g id="VpKuiitJ5SWVz4C4" style="transform:scale(1, 1);">
                                                        <path id="t9NWWlxzpoTP66Fz" d="M5.35997486,0 L30.81985378,0 C33.78008616,0 36.17982864,2.39974249 36.17982864,5.35997486 L36.17982864,5.35997486 C36.17982864,6.78152858 35.61511863,8.14485916 34.60992835,9.15004943 33.60473808,10.15523971 32.2414075,10.71994972 30.81985378,10.71994972 L5.35997486,10.71994972 C3.93842114,10.71994972 2.57509056,10.15523971 1.56990029,9.15004943 0.56471001,8.14485916 0,6.78152858 0,5.35997486 L0,5.35997486 C0,3.93842114 0.56471002,2.57509056 1.56990029,1.56990029 2.57509056,0.56471002 3.93842114,0 5.35997486,0 Z"
                                                        style="fill:#ffffff;opacity:1.0;"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="ec8cwn0hDPhALwgJ" style="z-index:11;">
                                    <div id="OKULi4ObW5Vd2MlW" style="box-sizing:border-box;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-08f85aba-692d-43c3-8cb2-94cf6a9734fe 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <div id="D5dfD58HnZwZ7fhD" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                    <p id="pHaGgoIZsjvS4mxW" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.38230446em;text-align:center;"><span id="PO1faJejtdUKVAxI" style="color:#000000;">#Fitur Cuti</span>
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="HtJwJPKnyEjRGDfB" style="z-index:12;">
                                <div id="i33r6LrIqi8fCu1v" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-1ff9cf78-3c01-4435-95f3-b4033f70a21b 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="gfZbihqq3p1CX5Gp" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="ngOT5CTqLGpdHRqU" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.19460754em;"><span id="gLltoAXY2fsNz8QN" style="color:#000000;font-weight:800;">Cuti</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="fu0kYDHWoQVeRjRa" style="z-index:13;">
                                <div id="cV2TF6yZ2E8JWsaV" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-782e73ab-ec39-4afe-b59b-7850dbd26d78 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="w96QxW2iQ3hhmtLP" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="WEI26KehQZHpynDq" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.45312727em;"><span id="NLoBNW2pPz6ddX0J" style="color:#000000;">Kelola Cuti Tanpa Repot — ​Tanpa Perlu Dokumen Fisik, ​Proses Cuti Secara Online, ​Bahkan Saat WFH.</span>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="HFZJzjlIuiNQw9OG" style="display:grid;position:relative;">
                            <div id="SY9B55fGufVghHRh" style="z-index:14;">
                                <div id="Kux2uE1jvfbEXSk3" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-c0fc85a7-e37a-4df8-aabd-5229ed284879 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <svg id="B9JqU7fMWbAkmvl6" viewBox="0 0 101.3333 101.3727" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <defs>
                                                    <radialGradient id="RbuKQshS66yluYGF" gradientUnits="userSpaceOnUse" cx="0" cy="0" r="144.24978336">
                                                        <stop offset="0%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                                        <stop offset="100%" stop-color="#ffffff" stop-opacity="1"></stop>
                                                    </radialGradient>
                                                </defs>
                                                <g id="UHNex1YYSMEHlAJm" style="transform:scale(1, 1);">
                                                    <g id="j9qwR0RHSPug4umo" style="clip-path:url(index.html#flzkbXAer5wbJi6x);">
                                                        <clipPath id="flzkbXAer5wbJi6x">
                                                            <path d="M6.37124236,0 L94.96209352,0 C96.65185205,0 98.27240248,0.67125396 99.4672422,1.86609368 100.66208192,3.0609334 101.33333588,4.68148382 101.33333588,6.37124236 L101.33333588,95.00142305 C101.33333588,96.69118158 100.66208191,98.31173201 99.4672422,99.50657172 98.27240248,100.70141144 96.65185205,101.37266541 94.96209352,101.37266541 L6.37124236,101.37266541 C2.85250237,101.3726654 0,98.52016304 0,95.00142305 L0,6.37124236 C0,2.85250237 2.85250237,0 6.37124236,0 Z"></path>
                                                        </clipPath>
                                                        <path id="lefdJG2DOR1ur7WW" d="M6.37124236,0 L94.96209352,0 C96.65185205,0 98.27240248,0.67125396 99.4672422,1.86609368 100.66208192,3.0609334 101.33333588,4.68148382 101.33333588,6.37124236 L101.33333588,95.00142305 C101.33333588,96.69118158 100.66208191,98.31173201 99.4672422,99.50657172 98.27240248,100.70141144 96.65185205,101.37266541 94.96209352,101.37266541 L6.37124236,101.37266541 C2.85250237,101.3726654 0,98.52016304 0,95.00142305 L0,6.37124236 C0,2.85250237 2.85250237,0 6.37124236,0 Z"
                                                        fill="url(#RbuKQshS66yluYGF)"></path>
                                                        <path id="hHmFS9ijOnWIP79n" d="M6.37124236,0 L94.96209352,0 C96.65185205,0 98.27240248,0.67125396 99.4672422,1.86609368 100.66208192,3.0609334 101.33333588,4.68148382 101.33333588,6.37124236 L101.33333588,95.00142305 C101.33333588,96.69118158 100.66208191,98.31173201 99.4672422,99.50657172 98.27240248,100.70141144 96.65185205,101.37266541 94.96209352,101.37266541 L6.37124236,101.37266541 C2.85250237,101.3726654 0,98.52016304 0,95.00142305 L0,6.37124236 C0,2.85250237 2.85250237,0 6.37124236,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#8d88a2;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg id="QS8yv9raAaYcG8Yv" viewBox="0 0 87.4135 111.2484" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <defs>
                                                    <radialGradient id="ZWwImOmj4Hk2vGdw" gradientUnits="userSpaceOnUse" cx="0" cy="0" r="142.43595052">
                                                        <stop offset="0%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                                        <stop offset="100%" stop-color="#ffffff" stop-opacity="1"></stop>
                                                    </radialGradient>
                                                </defs>
                                                <g id="hlOeS7GsjPI9xkrh" style="transform:scale(1, 1);">
                                                    <g id="q7lYRxpFz89Bof6w" style="clip-path:url(index.html#SZdXN8iQNdByYWCT);">
                                                        <clipPath id="SZdXN8iQNdByYWCT">
                                                            <path d="M5.49604714,0 L81.91742789,0 C83.37507022,0 84.77301132,0.57904616 85.8037201,1.60975494 86.83442888,2.64046371 87.41347504,4.03840481 87.41347504,5.49604714 L87.41347504,105.7523812 C87.41347504,107.21002353 86.83442887,108.60796463 85.8037201,109.63867341 84.77301132,110.66938218 83.37507022,111.24842834 81.91742789,111.24842834 L5.49604714,111.24842834 C4.03840481,111.24842835 2.64046371,110.66938218 1.60975494,109.63867341 0.57904616,108.60796463 0,107.21002353 0,105.7523812 L0,5.49604714 C0,4.03840481 0.57904616,2.64046372 1.60975494,1.60975494 2.64046371,0.57904616 4.03840481,0 5.49604714,0 Z"></path>
                                                        </clipPath>
                                                        <path id="vANGOfiXh4Sb3vSG" d="M5.49604714,0 L81.91742789,0 C83.37507022,0 84.77301132,0.57904616 85.8037201,1.60975494 86.83442888,2.64046371 87.41347504,4.03840481 87.41347504,5.49604714 L87.41347504,105.7523812 C87.41347504,107.21002353 86.83442887,108.60796463 85.8037201,109.63867341 84.77301132,110.66938218 83.37507022,111.24842834 81.91742789,111.24842834 L5.49604714,111.24842834 C4.03840481,111.24842835 2.64046371,110.66938218 1.60975494,109.63867341 0.57904616,108.60796463 0,107.21002353 0,105.7523812 L0,5.49604714 C0,4.03840481 0.57904616,2.64046372 1.60975494,1.60975494 2.64046371,0.57904616 4.03840481,0 5.49604714,0 Z"
                                                        fill="url(#ZWwImOmj4Hk2vGdw)"></path>
                                                        <path id="x8UPVsBuTc2Yy7RR" d="M5.49604714,0 L81.91742789,0 C83.37507022,0 84.77301132,0.57904616 85.8037201,1.60975494 86.83442888,2.64046371 87.41347504,4.03840481 87.41347504,5.49604714 L87.41347504,105.7523812 C87.41347504,107.21002353 86.83442887,108.60796463 85.8037201,109.63867341 84.77301132,110.66938218 83.37507022,111.24842834 81.91742789,111.24842834 L5.49604714,111.24842834 C4.03840481,111.24842835 2.64046371,110.66938218 1.60975494,109.63867341 0.57904616,108.60796463 0,107.21002353 0,105.7523812 L0,5.49604714 C0,4.03840481 0.57904616,2.64046372 1.60975494,1.60975494 2.64046371,0.57904616 4.03840481,0 5.49604714,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#8d88a2;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="WdUb5yW1yZVMH04h" style="z-index:15;">
                                <div id="O5DtX1iXX9QcsERI" style="padding-top:92.25%;">
                                    <div id="VuSWR8CaSDGkoTW4" style="position:absolute;top:0px;left:0px;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-70471088-3a17-420d-b5d6-e64a09c33b6e 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <div id="mHl4qfp1aupJ251l" style="width:100%;height:100%;opacity:1.0;">
                                                    <div id="nnNi86DG9CS2tzD4" style="transform:scale(1, 1);width:100%;height:100%;overflow:hidden;position:relative;">
                                                        <div id="XltV5DW4KfOdZwND" style="width:calc(100% * max(1, var(--scale-fill, 1)));height:calc(100% / min(1, var(--scale-fill, 1)));position:absolute;top:50%;left:50%;opacity:1.0;animation:pulse 1.5s ease-in-out infinite;"><img src="{{asset('welcome/images/3345c592acb1c806c69e2005a8a2f142.svg')}}" alt="Overtime Filled Line Icon" loading="lazy" style="width:100%;height:100%;display:block;object-fit:cover;object-position:50% 50%;transform:translate(-50%, -50%) rotate(0deg);"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="xRsyAKnKKO9QvQ7O" style="display:grid;position:relative;">
                                <div id="iAuFqHoAYWamOOrE" style="z-index:16;">
                                    <div id="XsWXBIgBR2Aj0NPF" style="box-sizing:border-box;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-f218cb2c-0c58-498d-9b7e-9748b44553a5 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <svg id="JbIeNHnzTndlmMMO" viewBox="0 0 44.3687 10.7199" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                    <g id="BBQl6xovCMc3PMMi" style="transform:scale(1, 1);">
                                                        <path id="YuZo69em8ERbEXOJ" d="M5.35997486,0 L39.00874233,0 C41.96897471,0 44.36871719,2.39974249 44.36871719,5.35997486 L44.36871719,5.35997486 C44.36871719,6.78152858 43.80400718,8.14485916 42.7988169,9.15004943 41.79362663,10.15523971 40.43029605,10.71994972 39.00874233,10.71994972 L5.35997486,10.71994972 C3.93842114,10.71994972 2.57509056,10.15523971 1.56990029,9.15004943 0.56471001,8.14485916 0,6.78152858 0,5.35997486 L0,5.35997486 C0,3.93842114 0.56471002,2.57509056 1.56990029,1.56990029 2.57509056,0.56471002 3.93842114,0 5.35997486,0 Z"
                                                        style="fill:#ffffff;opacity:1.0;"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="xZQaeRbHTletDO3H" style="z-index:17;">
                                    <div id="FOiOj5PGg9lh7EPR" style="box-sizing:border-box;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-05f527a4-ecd1-49b1-b992-fdcc54d537ab 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <div id="bR2WY9pfGBdDCPbf" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                    <p id="ghgOeW5rNloPi3Tt" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.38230446em;text-align:center;"><span id="d8N6i1b2lfjBTwqy" style="color:#000000;">#Fitur Lembur</span>
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="xeaKwKMvCrXcAIIl" style="z-index:18;">
                                <div id="GlNkwlpBGEMAh1Pr" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-5c2274f2-1c94-4f76-ae45-d9d14ac709e9 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="dvwgsAMsJbUagLSM" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="HuHmDF7HRSeeqO3N" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.19460754em;"><span id="Xn1rSMXXCJeZV4MN" style="color:#000000;font-weight:800;">Lembur</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="hvbCPa7Vu0W8FmmG" style="z-index:19;">
                                <div id="k3KNBLkozk2IiaVL" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-14544875-d449-4d2d-be46-85c8c02f2a93 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="abbhH1yla9LAqxcA" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="ioWFUVu8noNgOgEd" style="color:#000000;direction:ltr;font-family:YAFdtQJYB9w-1;margin-left:0em;line-height:1.49999531em;text-align:left;text-transform:none;letter-spacing:0em;"><span id="DeySDzLEesVEF42c" style="text-decoration-line:none;color:#000000;">Kelola Lembur Tanpa Repot ​— Tanpa Perlu Dokumen ​Fisik, Proses lembur secara ​Online.</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="lLvHUINfrAPH3KTc" style="display:grid;position:relative;">
                            <div id="gKVdWpK0v2nGQ0E8" style="z-index:20;">
                                <div id="zmxM7iePpGSIKZq0" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-e7ab57fb-1600-48be-b087-fb34ed5b50fa 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <svg id="tGNyBOxpmK6wLOme" viewBox="0 0 101.3333 100.8" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <defs>
                                                    <radialGradient id="Ayr7dQaHxPtidDLa" gradientUnits="userSpaceOnUse" cx="0" cy="0" r="143.54441821">
                                                        <stop offset="0%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                                        <stop offset="100%" stop-color="#ffffff" stop-opacity="1"></stop>
                                                    </radialGradient>
                                                </defs>
                                                <g id="BxEuesOqudBFBUXL" style="transform:scale(1, 1);">
                                                    <g id="VfKcW6PDEfrULa8h" style="clip-path:url(index.html#xEKyw3avefu717Hg);">
                                                        <clipPath id="xEKyw3avefu717Hg">
                                                            <path d="M6.37124236,0 L94.96209352,0 C96.65185205,0 98.27240248,0.67125396 99.4672422,1.86609368 100.66208192,3.0609334 101.33333588,4.68148382 101.33333588,6.37124236 L101.33333588,94.42876069 C101.33333588,97.94750068 98.48083351,100.80000305 94.96209352,100.80000305 L6.37124236,100.80000305 C4.68148382,100.80000305 3.0609334,100.12874909 1.86609368,98.93390937 0.67125396,97.73906965 0,96.11851922 0,94.42876069 L0,6.37124236 C0,2.85250237 2.85250237,0 6.37124236,0 Z"></path>
                                                        </clipPath>
                                                        <path id="q1G4QBAMPIOr7sGe" d="M6.37124236,0 L94.96209352,0 C96.65185205,0 98.27240248,0.67125396 99.4672422,1.86609368 100.66208192,3.0609334 101.33333588,4.68148382 101.33333588,6.37124236 L101.33333588,94.42876069 C101.33333588,97.94750068 98.48083351,100.80000305 94.96209352,100.80000305 L6.37124236,100.80000305 C4.68148382,100.80000305 3.0609334,100.12874909 1.86609368,98.93390937 0.67125396,97.73906965 0,96.11851922 0,94.42876069 L0,6.37124236 C0,2.85250237 2.85250237,0 6.37124236,0 Z"
                                                        fill="url(#Ayr7dQaHxPtidDLa)"></path>
                                                        <path id="YDGADzZ6Yw56G0qT" d="M6.37124236,0 L94.96209352,0 C96.65185205,0 98.27240248,0.67125396 99.4672422,1.86609368 100.66208192,3.0609334 101.33333588,4.68148382 101.33333588,6.37124236 L101.33333588,94.42876069 C101.33333588,97.94750068 98.48083351,100.80000305 94.96209352,100.80000305 L6.37124236,100.80000305 C4.68148382,100.80000305 3.0609334,100.12874909 1.86609368,98.93390937 0.67125396,97.73906965 0,96.11851922 0,94.42876069 L0,6.37124236 C0,2.85250237 2.85250237,0 6.37124236,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#8d88a2;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg id="gcFACcqTUfmXhuBb" viewBox="0 0 87.4135 109.6633" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <defs>
                                                    <radialGradient id="W84F7eJMKrMYfyiH" gradientUnits="userSpaceOnUse" cx="0" cy="0" r="140.86873322">
                                                        <stop offset="0%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                                        <stop offset="100%" stop-color="#ffffff" stop-opacity="1"></stop>
                                                    </radialGradient>
                                                </defs>
                                                <g id="kjVKQ48Wq58PxGTU" style="transform:scale(1, 1);">
                                                    <g id="BaC0FI7N5Bg7kxsU" style="clip-path:url(index.html#DDe0O3ZDxPllUEGv);">
                                                        <clipPath id="DDe0O3ZDxPllUEGv">
                                                            <path d="M5.49604714,0 L81.91742789,0 C83.37507022,0 84.77301132,0.57904616 85.8037201,1.60975494 86.83442888,2.64046371 87.41347504,4.03840481 87.41347504,5.49604714 L87.41347504,104.16729056 C87.41347504,105.6249329 86.83442888,107.02287399 85.8037201,108.05358277 84.77301132,109.08429155 83.37507022,109.66333771 81.91742789,109.66333771 L5.49604714,109.66333771 C4.03840481,109.66333771 2.64046371,109.08429155 1.60975494,108.05358277 0.57904616,107.02287399 0,105.62493289 0,104.16729056 L0,5.49604714 C0,4.03840481 0.57904616,2.64046372 1.60975494,1.60975494 2.64046371,0.57904616 4.03840481,0 5.49604714,0 Z"></path>
                                                        </clipPath>
                                                        <path id="y3Mbf803amEcK0VW" d="M5.49604714,0 L81.91742789,0 C83.37507022,0 84.77301132,0.57904616 85.8037201,1.60975494 86.83442888,2.64046371 87.41347504,4.03840481 87.41347504,5.49604714 L87.41347504,104.16729056 C87.41347504,105.6249329 86.83442888,107.02287399 85.8037201,108.05358277 84.77301132,109.08429155 83.37507022,109.66333771 81.91742789,109.66333771 L5.49604714,109.66333771 C4.03840481,109.66333771 2.64046371,109.08429155 1.60975494,108.05358277 0.57904616,107.02287399 0,105.62493289 0,104.16729056 L0,5.49604714 C0,4.03840481 0.57904616,2.64046372 1.60975494,1.60975494 2.64046371,0.57904616 4.03840481,0 5.49604714,0 Z"
                                                        fill="url(#W84F7eJMKrMYfyiH)"></path>
                                                        <path id="pMnAcbSxkFrwvjy6" d="M5.49604714,0 L81.91742789,0 C83.37507022,0 84.77301132,0.57904616 85.8037201,1.60975494 86.83442888,2.64046371 87.41347504,4.03840481 87.41347504,5.49604714 L87.41347504,104.16729056 C87.41347504,105.6249329 86.83442888,107.02287399 85.8037201,108.05358277 84.77301132,109.08429155 83.37507022,109.66333771 81.91742789,109.66333771 L5.49604714,109.66333771 C4.03840481,109.66333771 2.64046371,109.08429155 1.60975494,108.05358277 0.57904616,107.02287399 0,105.62493289 0,104.16729056 L0,5.49604714 C0,4.03840481 0.57904616,2.64046372 1.60975494,1.60975494 2.64046371,0.57904616 4.03840481,0 5.49604714,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#8d88a2;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="R4jzVNa7fv7rblrm" style="z-index:21;">
                                <div id="RXlSrW7cjki3k5nQ" style="padding-top:120.30075188%;">
                                    <div id="qsoSAppe7Kp6A2Rz" style="position:absolute;top:0px;left:0px;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-8bfc46d3-4aca-4bab-89db-f581bfd69e57 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <div id="P1w4UbuowEzWEMbe" style="width:100%;height:100%;opacity:1.0;">
                                                    <div id="QiG8ndRpebaylcEc" style="transform:scale(1, 1);width:100%;height:100%;overflow:hidden;position:relative;">
                                                        <div id="NPePLZlKGJwbssTn" style="width:calc(100% * max(1, var(--scale-fill, 1)));height:calc(100% / min(1, var(--scale-fill, 1)));position:absolute;top:50%;left:50%;opacity:1.0;animation:pulse 1.5s ease-in-out infinite;"><img src="{{asset('welcome/images/c797451f9bac1baa987db0f04c7b5996.svg')}}" alt="Reimbursement Icon" loading="lazy" style="width:100%;height:100%;display:block;object-fit:cover;object-position:50% 50%;transform:translate(-50%, -50%) rotate(0deg);"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="jMgQ9ylLsBRNxMV3" style="display:grid;position:relative;">
                                <div id="u1ZYqDFuVK8XRIqr" style="z-index:22;">
                                    <div id="b4GnY4LWKgE33X4V" style="box-sizing:border-box;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-dbbb35ee-1f87-4a1d-8d5b-9b047ba05e9b 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <svg id="pXqNZ54zBQ733849" viewBox="0 0 48.2398 10.7199" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                    <g id="FoK4PZs7KiMJPGbK" style="transform:scale(1, 1);">
                                                        <path id="Kb5G6pASs0dONHM1" d="M5.35997486,0 L42.87979794,0 C44.30135165,0 45.66468223,0.56471001 46.66987251,1.56990029 47.67506278,2.57509056 48.2397728,3.93842114 48.2397728,5.35997486 L48.2397728,5.35997486 C48.2397728,8.32020723 45.84003031,10.71994972 42.87979794,10.71994972 L5.35997486,10.71994972 C3.93842114,10.71994972 2.57509056,10.15523971 1.56990029,9.15004943 0.56471001,8.14485916 0,6.78152858 0,5.35997486 L0,5.35997486 C0,3.93842114 0.56471002,2.57509056 1.56990029,1.56990029 2.57509056,0.56471002 3.93842114,0 5.35997486,0 Z"
                                                        style="fill:#ffffff;opacity:1.0;"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="LxY4KydgzCBM7RdL" style="z-index:23;">
                                    <div id="h7comuCnEJOQd7Pt" style="box-sizing:border-box;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-688882ed-f143-4f8d-a987-688eeda801e9 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <div id="ZIDcidZnssZr3SG4" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                    <p id="h20ju9AQGXWJ5wor" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.38230446em;text-align:center;"><span id="itM5TMdcjg22GcXP" style="color:#000000;">#Fitur Rembes</span>
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="RRI09WZ1rQfDZqnK" style="z-index:24;">
                                <div id="Jajv11ywORVm3xq8" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-fa568dd0-660f-483b-ac01-55c490c64f22 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="zj4dLQfZvQmJq2j9" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="Fr3JK8gO3Zr1WZSp" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.19460754em;"><span id="uQTsEQOMyYmu5yTh" style="color:#000000;font-weight:800;">Rembes</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="xhu0fcMLUsxlGndK" style="z-index:25;">
                                <div id="A7ekk6ZLedlHFoof" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-dd234c23-29e0-40a5-9e41-20ff7c598cb6 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="I25kDcgVW8wISyGc" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="Zpm01eBD0T5NWjsU" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.45312727em;"><span id="gw4EnFXSrXMvHSxX" style="color:#000000;">Kelola Rembes Tanpa Repot ​— Tanpa Perlu Dokumen ​Fisik, Proses rembes secara ​Online.</span>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <a id="page-3" aria-hidden="true" style="visibility:hidden;"></a>
        <section id="yWMbDGDsK7sbEWOS" style="position:relative;overflow:hidden;display:grid;align-items:center;grid-template-columns:auto 100rem auto;z-index:0;margin-top:-1px;">
            <div id="QSwA29m8AcCRFxz7" style="grid-area:1 / 1 / 2 / 4;display:grid;position:absolute;min-height:100%;min-width:100%;">
                <div id="ZoDnpyoIBJJhztIB" style="z-index:0;">
                    <div id="pBSshx2s7RhcCnVA" style="box-sizing:border-box;width:100%;height:100%;transform:rotate(0deg);">
                        <div id="bXciBIg8D0QyOCii" style="width:100%;height:100%;opacity:1.0;">
                            <div id="qd7S8JSJ9mlJv6sW" style="transform:scale(1, 1);width:100%;height:100%;overflow:hidden;position:relative;">
                                {{-- <svg id="HtI6PijCQkCSBAmp" viewBox="0 0 1366.0 768.0" preserveAspectRatio="none" style="width:100%;height:100%;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                    <defs>
                                        <linearGradient id="QkErk6DRtXSRDRkY" gradientUnits="userSpaceOnUse" x1="0" y1="384" x2="1366" y2="384">
                                            <stop offset="0%" stop-color="#13072e" stop-opacity="1"></stop>
                                            <stop offset="100%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                        </linearGradient>
                                    </defs>
                                    <rect id="GnK2mqIHcBFZN6gP" width="1366" height="768" style="fill:url(index.html#QkErk6DRtXSRDRkY);"></rect>
                                </svg> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="h7dyAGi0GgQmsMB6" style="display:grid;position:relative;grid-area:1 / 2 / 2 / 3;">
                <div id="Tq54W4HU32vhY1sP" style="z-index:1;">
                    <div id="cvxwWqwZ4lGSFQ1A" style="box-sizing:border-box;width:100%;height:100%;">
                        <div class="animation_container" style="width:100%;height:100%;">
                            <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-26192f0e-31a7-4303-b26e-ac7f265ef220 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                <div id="WuYDnlPdJzYAEcEj" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                    <p id="xcMlBtpirTX9ZgX3" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.19028489em;text-align:center;letter-spacing:-0.02em;"><span id="BF2NQuoFiYR7COc1" style="color:#ffffff;font-weight:800;">Panduan Shap</span>
                                        <br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="BvmHEE8G9RsjYs9T">
                    <div id="tN3UE0UzkfWXWCMt" style="display:grid;position:relative;">
                        <div id="C5nxWXmUkBPEto0P" style="display:grid;position:relative;">
                            <div id="HnldeWBhWetgPfPt" style="z-index:3;">
                                <div id="pIgSLD954Y8zy4pp" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-09fd6883-e92c-4d1c-b8fe-7740184cb888 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <svg id="j0C3oDCUa6347vdW" viewBox="0 0 101.3333 128.4263" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <defs>
                                                    <radialGradient id="RKI3fT2spBCrehSm" gradientUnits="userSpaceOnUse" cx="0" cy="0" r="164.45364088">
                                                        <stop offset="0%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                                        <stop offset="100%" stop-color="#ffffff" stop-opacity="1"></stop>
                                                    </radialGradient>
                                                </defs>
                                                <g id="FVFZZSUINqkoAmtm" style="transform:scale(1, 1);">
                                                    <g id="Jw7crVDbBDxiFTzQ" style="clip-path:url(index.html#afQX8DrciqovjXlG);">
                                                        <clipPath id="afQX8DrciqovjXlG">
                                                            <path d="M6.34817953,0 L94.98515634,0 C96.66879824,0 98.28348254,0.66882413 99.47399714,1.85933873 100.66451174,3.04985333 101.33333588,4.66453764 101.33333588,6.34817953 L101.33333588,122.07807474 C101.33333588,123.76171663 100.66451174,125.37640094 99.47399714,126.56691554 98.28348254,127.75743013 96.66879823,128.42625427 94.98515634,128.42625427 L6.34817953,128.42625427 C4.66453764,128.42625427 3.04985334,127.75743014 1.85933874,126.56691554 0.66882414,125.37640094 0,123.76171663 0,122.07807474 L0,6.34817953 C0,4.66453764 0.66882414,3.04985334 1.85933873,1.85933874 3.04985333,0.66882414 4.66453764,0 6.34817953,0 Z"></path>
                                                        </clipPath>
                                                        <path id="vqE2M3X3aEvZcZoX" d="M6.34817953,0 L94.98515634,0 C96.66879824,0 98.28348254,0.66882413 99.47399714,1.85933873 100.66451174,3.04985333 101.33333588,4.66453764 101.33333588,6.34817953 L101.33333588,122.07807474 C101.33333588,123.76171663 100.66451174,125.37640094 99.47399714,126.56691554 98.28348254,127.75743013 96.66879823,128.42625427 94.98515634,128.42625427 L6.34817953,128.42625427 C4.66453764,128.42625427 3.04985334,127.75743014 1.85933874,126.56691554 0.66882414,125.37640094 0,123.76171663 0,122.07807474 L0,6.34817953 C0,4.66453764 0.66882414,3.04985334 1.85933873,1.85933874 3.04985333,0.66882414 4.66453764,0 6.34817953,0 Z"
                                                        fill="url(#RKI3fT2spBCrehSm)"></path>
                                                        <path id="WeF9pPQGfl4KpDuq" d="M6.34817953,0 L94.98515634,0 C96.66879824,0 98.28348254,0.66882413 99.47399714,1.85933873 100.66451174,3.04985333 101.33333588,4.66453764 101.33333588,6.34817953 L101.33333588,122.07807474 C101.33333588,123.76171663 100.66451174,125.37640094 99.47399714,126.56691554 98.28348254,127.75743013 96.66879823,128.42625427 94.98515634,128.42625427 L6.34817953,128.42625427 C4.66453764,128.42625427 3.04985334,127.75743014 1.85933874,126.56691554 0.66882414,125.37640094 0,123.76171663 0,122.07807474 L0,6.34817953 C0,4.66453764 0.66882414,3.04985334 1.85933873,1.85933874 3.04985333,0.66882414 4.66453764,0 6.34817953,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#b3aaff;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg id="flyy3IaZg1LbDVJ4" viewBox="0 0 87.0971 134.5205" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <defs>
                                                    <radialGradient id="jjHDsRTnH7kSxhJx" gradientUnits="userSpaceOnUse" cx="0" cy="0" r="161.14899938">
                                                        <stop offset="0%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                                        <stop offset="100%" stop-color="#ffffff" stop-opacity="1"></stop>
                                                    </radialGradient>
                                                </defs>
                                                <g id="HGeWynltPMkxB6tD" style="transform:scale(1, 1);">
                                                    <g id="gQtMzEgEPlHn75kK" style="clip-path:url(index.html#rd98CtrAC7CIO8jM);">
                                                        <clipPath id="rd98CtrAC7CIO8jM">
                                                            <path d="M5.45633102,0 L81.64072251,0 C84.65417092,0 87.09705353,2.44288261 87.09705353,5.45633102 L87.09705353,129.0641768 C87.09705352,132.07762521 84.65417092,134.52050781 81.64072251,134.52050781 L5.45633102,134.52050781 C2.44288261,134.52050781 0,132.07762521 0,129.0641768 L0,5.45633102 C0,2.44288261 2.44288261,0 5.45633102,0 Z"></path>
                                                        </clipPath>
                                                        <path id="dSEuheN9IkeH5mAd" d="M5.45633102,0 L81.64072251,0 C84.65417092,0 87.09705353,2.44288261 87.09705353,5.45633102 L87.09705353,129.0641768 C87.09705352,132.07762521 84.65417092,134.52050781 81.64072251,134.52050781 L5.45633102,134.52050781 C2.44288261,134.52050781 0,132.07762521 0,129.0641768 L0,5.45633102 C0,2.44288261 2.44288261,0 5.45633102,0 Z"
                                                        fill="url(#jjHDsRTnH7kSxhJx)"></path>
                                                        <path id="GsAhoMou0Z7IV6rQ" d="M5.45633102,0 L81.64072251,0 C84.65417092,0 87.09705353,2.44288261 87.09705353,5.45633102 L87.09705353,129.0641768 C87.09705352,132.07762521 84.65417092,134.52050781 81.64072251,134.52050781 L5.45633102,134.52050781 C2.44288261,134.52050781 0,132.07762521 0,129.0641768 L0,5.45633102 C0,2.44288261 2.44288261,0 5.45633102,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#b3aaff;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="hqnp3FgtIRdrbXCa" style="display:grid;position:relative;">
                                <div id="qmdLgyqy6AEvtoYe" style="z-index:4;">
                                    <div id="EnbnQpspEqsYRmAf" style="box-sizing:border-box;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-14d5486a-da1e-4cf2-91df-047fa58d2c5c 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <div id="AKiVQlvTav0hmtb8" style="width:100%;height:100%;opacity:1.0;">
                                                    <div id="ZgAfbpslfifnCTbw" style="transform:scale(1, 1);width:100%;height:100%;overflow:hidden;position:relative;border-radius:6.61268919%/9.91903379%;">
                                                        <div id="sKaS9pFfDR8g9mi1" style="width:calc(100% * max(1, var(--scale-fill, 1)));height:calc(100% / min(1, var(--scale-fill, 1)));position:absolute;top:50%;left:50%;opacity:1.0;animation:pulse 1.5s ease-in-out infinite;"><img src="{{asset('welcome/images/ac6f522af68519112a11d6de628c3396.jpg')}}" alt="Flash People Portraits Woman Lounging on Chair with Laptop" loading="lazy" style="width:100%;height:100%;display:block;object-fit:cover;object-position:50% 50%;transform:translate(-50%, -50%) rotate(0deg);"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="QTmdBxiauzQzsvn9" style="display:grid;position:relative;grid-area:3 / 3 / 4 / 4;">
                                    <div id="Z2acG3OLSc0X3Tk6" style="z-index:5;">
                                        <div id="jBHHGyF0X2FAAtYH" style="box-sizing:border-box;width:100%;height:100%;">
                                            <div class="animation_container" style="width:100%;height:100%;">
                                                <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-cfc73f83-3b7c-49ff-8897-393fc728052c 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                    <svg id="SkhbKFafzbOrzIs6" viewBox="0 0 30.0159 10.7199" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                        <g id="OHG51bG6Tip1Rb78" style="transform:scale(1, 1);">
                                                            <path id="FHrT0Xc8WEAgAeKn" d="M5.35997486,0 L24.65588474,0 C27.61611712,0 30.0158596,2.39974249 30.0158596,5.35997486 L30.0158596,5.35997486 C30.0158596,6.78152858 29.45114959,8.14485916 28.44595931,9.15004943 27.44076904,10.15523971 26.07743846,10.71994972 24.65588474,10.71994972 L5.35997486,10.71994972 C3.93842114,10.71994972 2.57509056,10.15523971 1.56990029,9.15004943 0.56471001,8.14485916 0,6.78152858 0,5.35997486 L0,5.35997486 C0,3.93842114 0.56471002,2.57509056 1.56990029,1.56990029 2.57509056,0.56471002 3.93842114,0 5.35997486,0 Z"
                                                            style="fill:#ffffff;opacity:1.0;"></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="bC5T8Tq5GXA2bneW" style="z-index:7;">
                                        <div id="unNA22mQkccHAJfK" style="box-sizing:border-box;width:100%;height:100%;">
                                            <div class="animation_container" style="width:100%;height:100%;">
                                                <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-edf51548-454a-4d76-89c0-2c86dce3ca0f 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                    <div id="gq70NkIrOPQLvmzQ" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                        <p id="OmlWtBDlAtaTlPHU" style="color:#13072e;font-family:YAFdtQJYB9w-1;line-height:1.37730507em;text-align:center;"><span id="Q7yLH9cHJEpqiPgO" style="color:#13072e;">#trends</span>
                                                            <br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="CrXrHH4U0fti4vjt" style="z-index:8;">
                                <div id="TKMYmsFNag3bRw2Q" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-c851edb5-3396-4bd9-85b7-366fe48f25f1 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="IB0wouYW7eYfRWx2" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="c8pQvFOmmRvhEEiy" style="color:#13072e;font-family:YAFdtQJYB9w-1;line-height:1.37730507em;"><span id="ljybwVeQXdn8VoaH" style="color:#13072e;">July 22, 2024</span>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="BLFP364V1OsxEB8d" style="z-index:6;">
                                <div id="Uxh0LtSVwsM2whme" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-803d1294-ffec-4a5e-ae43-07e4987155a5 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="oM8E3xP8kRXtYuuS" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="P5952pXs37qH3REn" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.19028135em;"><span id="C0Rash3k5heSNQXs" style="color:#000000;font-weight:800;">Cara mengajukan ​rembes</span>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="jZmmwlsi0FiNrfDS" style="z-index:9;">
                                <div id="teOXszvChvV48qhv" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-64aa3098-b07d-4de4-ae01-29dc0d4427d9 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="ryFeGPUC5MTnZQiy" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="d79G8HvKHCLtDZv1" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.37730507em;"><a id="gtUlQeXNTSl5Yn65" target="_blank" rel="noopener" href="{{ route('filament.employee.auth.login') }}" style="color:#000000;pointer-events:all;" data-interstitial-link="">Baca selengkapnya →</a>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="B0RWRJop2GBfaeyC" style="display:grid;position:relative;">
                            <div id="sZgqFvFzuqMGpcUa" style="z-index:17;">
                                <div id="puzZg3LoK4JEwS83" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-23daa1fd-d980-4a4f-914c-4fd195c64266 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <svg id="rcPm9zqGL180YBYQ" viewBox="0 0 101.3333 128.4263" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <defs>
                                                    <radialGradient id="RsVCcAr5qNFLaYpO" gradientUnits="userSpaceOnUse" cx="0" cy="0" r="164.45364088">
                                                        <stop offset="0%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                                        <stop offset="100%" stop-color="#ffffff" stop-opacity="1"></stop>
                                                    </radialGradient>
                                                </defs>
                                                <g id="R4fBIHuszkSEywXV" style="transform:scale(1, 1);">
                                                    <g id="lX9VSiMP7zKIqLwu" style="clip-path:url(index.html#FX3Xk2AIFwDgk7SG);">
                                                        <clipPath id="FX3Xk2AIFwDgk7SG">
                                                            <path d="M6.34817953,0 L94.98515634,0 C96.66879824,0 98.28348254,0.66882413 99.47399714,1.85933873 100.66451174,3.04985333 101.33333588,4.66453764 101.33333588,6.34817953 L101.33333588,122.07807474 C101.33333588,123.76171663 100.66451174,125.37640094 99.47399714,126.56691554 98.28348254,127.75743013 96.66879823,128.42625427 94.98515634,128.42625427 L6.34817953,128.42625427 C4.66453764,128.42625427 3.04985334,127.75743014 1.85933874,126.56691554 0.66882414,125.37640094 0,123.76171663 0,122.07807474 L0,6.34817953 C0,4.66453764 0.66882414,3.04985334 1.85933873,1.85933874 3.04985333,0.66882414 4.66453764,0 6.34817953,0 Z"></path>
                                                        </clipPath>
                                                        <path id="QopCWpj5tYJh4I8Z" d="M6.34817953,0 L94.98515634,0 C96.66879824,0 98.28348254,0.66882413 99.47399714,1.85933873 100.66451174,3.04985333 101.33333588,4.66453764 101.33333588,6.34817953 L101.33333588,122.07807474 C101.33333588,123.76171663 100.66451174,125.37640094 99.47399714,126.56691554 98.28348254,127.75743013 96.66879823,128.42625427 94.98515634,128.42625427 L6.34817953,128.42625427 C4.66453764,128.42625427 3.04985334,127.75743014 1.85933874,126.56691554 0.66882414,125.37640094 0,123.76171663 0,122.07807474 L0,6.34817953 C0,4.66453764 0.66882414,3.04985334 1.85933873,1.85933874 3.04985333,0.66882414 4.66453764,0 6.34817953,0 Z"
                                                        fill="url(#RsVCcAr5qNFLaYpO)"></path>
                                                        <path id="WqOq5qC1vQiYrxsQ" d="M6.34817953,0 L94.98515634,0 C96.66879824,0 98.28348254,0.66882413 99.47399714,1.85933873 100.66451174,3.04985333 101.33333588,4.66453764 101.33333588,6.34817953 L101.33333588,122.07807474 C101.33333588,123.76171663 100.66451174,125.37640094 99.47399714,126.56691554 98.28348254,127.75743013 96.66879823,128.42625427 94.98515634,128.42625427 L6.34817953,128.42625427 C4.66453764,128.42625427 3.04985334,127.75743014 1.85933874,126.56691554 0.66882414,125.37640094 0,123.76171663 0,122.07807474 L0,6.34817953 C0,4.66453764 0.66882414,3.04985334 1.85933873,1.85933874 3.04985333,0.66882414 4.66453764,0 6.34817953,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#b3aaff;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg id="pzbBcKpjjYYU24eG" viewBox="0 0 87.0971 134.5205" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <defs>
                                                    <radialGradient id="kijMz1ic5OQ4KSU9" gradientUnits="userSpaceOnUse" cx="0" cy="0" r="161.14899938">
                                                        <stop offset="0%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                                        <stop offset="100%" stop-color="#ffffff" stop-opacity="1"></stop>
                                                    </radialGradient>
                                                </defs>
                                                <g id="IeJC0Bnj8Evt1EaM" style="transform:scale(1, 1);">
                                                    <g id="S0OPk6bJnrR1NcSV" style="clip-path:url(index.html#oJVctLcxOph2VDbK);">
                                                        <clipPath id="oJVctLcxOph2VDbK">
                                                            <path d="M5.45633102,0 L81.64072251,0 C84.65417092,0 87.09705353,2.44288261 87.09705353,5.45633102 L87.09705353,129.0641768 C87.09705352,132.07762521 84.65417092,134.52050781 81.64072251,134.52050781 L5.45633102,134.52050781 C2.44288261,134.52050781 0,132.07762521 0,129.0641768 L0,5.45633102 C0,2.44288261 2.44288261,0 5.45633102,0 Z"></path>
                                                        </clipPath>
                                                        <path id="AuVC1oM0YFaV2e38" d="M5.45633102,0 L81.64072251,0 C84.65417092,0 87.09705353,2.44288261 87.09705353,5.45633102 L87.09705353,129.0641768 C87.09705352,132.07762521 84.65417092,134.52050781 81.64072251,134.52050781 L5.45633102,134.52050781 C2.44288261,134.52050781 0,132.07762521 0,129.0641768 L0,5.45633102 C0,2.44288261 2.44288261,0 5.45633102,0 Z"
                                                        fill="url(#kijMz1ic5OQ4KSU9)"></path>
                                                        <path id="kjxgxMRH83jISrav" d="M5.45633102,0 L81.64072251,0 C84.65417092,0 87.09705353,2.44288261 87.09705353,5.45633102 L87.09705353,129.0641768 C87.09705352,132.07762521 84.65417092,134.52050781 81.64072251,134.52050781 L5.45633102,134.52050781 C2.44288261,134.52050781 0,132.07762521 0,129.0641768 L0,5.45633102 C0,2.44288261 2.44288261,0 5.45633102,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#b3aaff;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="TQ6cHYsIG8i4IXZY" style="display:grid;position:relative;">
                                <div id="Pl8XkNy9UVfCFb5z" style="z-index:18;">
                                    <div id="g79QzzkoBUkGQgqi" style="box-sizing:border-box;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-2abde627-4f17-4cea-a076-dec677e0080e 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <div id="XuT1QH8Ouei33jJ0" style="width:100%;height:100%;opacity:1.0;">
                                                    <div id="wUT1fu0Xv1f1xszZ" style="transform:scale(1, 1);width:100%;height:100%;overflow:hidden;position:relative;border-radius:6.61268919%/9.91903379%;">
                                                        <div id="pusW4PNSFMGqG4kM" style="width:calc(100% * max(1, var(--scale-fill, 1)));height:calc(112.5% / min(1, var(--scale-fill, 1)));position:absolute;top:50%;left:50%;opacity:1.0;animation:pulse 1.5s ease-in-out infinite;"><img src="{{asset('welcome/images/fb5b9d6c35f1200af684b061eb044bd8.jpg')}}" alt="CPU Stream" loading="lazy" srcset="{{asset('welcome/images/fb5b9d6c35f1200af684b061eb044bd8.jpg')}} 720w, {{asset('welcome/images/fb5b9d6c35f1200af684b061eb044bd8.jpg')}} 1080w"
                                                            sizes="(max-width: 375px) 78.66666667vw, (min-width: 375.05px) and (max-width: 480px) 78.76271186vw, (min-width: 480.05px) and (max-width: 768px) 49.22669492vw, (min-width: 768.05px) and (max-width: 1024px) 36.92002119vw, (min-width: 1024.05px) 27.67650197vw"
                                                            style="width:100%;height:100%;display:block;object-fit:cover;object-position:50% 50%;transform:translate(-50%, -50%) rotate(0deg);"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="f1DUv9ahpmWOrpyH" style="display:grid;position:relative;grid-area:3 / 3 / 4 / 4;">
                                    <div id="DCowvGcW86Wtt039" style="z-index:19;">
                                        <div id="KHppLtFK65davQ3E" style="box-sizing:border-box;width:100%;height:100%;">
                                            <div class="animation_container" style="width:100%;height:100%;">
                                                <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-7c576ed0-82a3-4d40-9686-f7e55bc9f609 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                    <svg id="LmcdP9aPlVhNWhSN" viewBox="0 0 26.7999 10.7199" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                        <g id="ghE94TyIkOKckhqT" style="transform:scale(1, 1);">
                                                            <path id="aFxjOYjhk5qYmOQS" d="M5.35997486,0 L21.43989849,0 C24.40013087,0 26.79987335,2.39974249 26.79987335,5.35997486 L26.79987335,5.35997486 C26.79987335,6.78152858 26.23516334,8.14485916 25.22997306,9.15004943 24.22478279,10.15523971 22.86145221,10.71994972 21.43989849,10.71994972 L5.35997486,10.71994972 C3.93842114,10.71994972 2.57509056,10.15523971 1.56990029,9.15004943 0.56471001,8.14485916 0,6.78152858 0,5.35997486 L0,5.35997486 C0,3.93842114 0.56471002,2.57509056 1.56990029,1.56990029 2.57509056,0.56471002 3.93842114,0 5.35997486,0 Z"
                                                            style="fill:#ffffff;opacity:1.0;"></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="BXnzkeq1eNNVZP9w" style="z-index:21;">
                                        <div id="U0YujAvpPVwjxLZy" style="box-sizing:border-box;width:100%;height:100%;">
                                            <div class="animation_container" style="width:100%;height:100%;">
                                                <div class="animated" style="width:100%;height:100%;animation:rise-LEFT-a086e4a2-6f09-4ea3-bf70-a580ecba1ff1 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                    <div id="X4hiKhk4S7GNB8mQ" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                        <p id="CVAsQjO6jbzjS85C" style="color:#13072e;font-family:YAFdtQJYB9w-1;line-height:1.37730507em;text-align:center;"><span id="TFOMQD2YT28JJFku" style="color:#13072e;">#news</span>
                                                            <br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="Bsv3avISaboADyyq" style="z-index:22;">
                                <div id="qr8z9dpyQJVZgml0" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-e8dfbe16-78ad-4a30-a4c0-1941e96c17df 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="qIjG7tQOyWrvXsRr" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="OXUuYxeOYVhvPqMa" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.37730507em;"><span id="vUpC0mNFdpLiHNnP" style="color:#000000;">July 15, 2024</span>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="kVPYK5706PkkxkfC" style="z-index:20;">
                                <div id="ZpvR4IpT27N0isih" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-1766a161-9983-49a6-96dd-0b11cfdc3e9e 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="pO5dO69pHY1WXzW4" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="jiVRU2O4DRBdyDKY" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.19028135em;"><span id="yMIvlmAmWkayTj4D" style="color:#000000;font-weight:800;">Cara mengajukan ​lembur</span>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="FyAnzNZOsxh0O1FN" style="z-index:23;">
                                <div id="jc3pymb4zfWmUy7m" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-e214f5ef-47c0-4fe0-a995-7c14338b3361 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="HnW2krZ0AZ0DjV8k" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="wo8vtHsg3fic8FIP" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.37730507em;"><a id="gIG4amxaT2XnXoOs" target="_blank" rel="noopener" href="{{ route('filament.employee.auth.login') }}" style="color:#000000;pointer-events:all;" data-interstitial-link="">Baca selengkapnya →</a>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="VGB7nm6v1KbAXbCr" style="display:grid;position:relative;">
                            <div id="IyojT3xKt7UD0WVb" style="z-index:10;">
                                <div id="P5R0jDaQ7UH0oeEk" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-b347de44-c245-4382-be6a-c7ace67734fc 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <svg id="lO4p1tPXzIJMRIYt" viewBox="0 0 101.3333 128.4263" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <defs>
                                                    <radialGradient id="c54PUHKscPY7ttuV" gradientUnits="userSpaceOnUse" cx="0" cy="0" r="164.45364088">
                                                        <stop offset="0%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                                        <stop offset="100%" stop-color="#ffffff" stop-opacity="1"></stop>
                                                    </radialGradient>
                                                </defs>
                                                <g id="aqlZaezMQaABmdYx" style="transform:scale(1, 1);">
                                                    <g id="DE31JiQ76GGy9Qa6" style="clip-path:url(index.html#b8a8loV0a1rwYNwL);">
                                                        <clipPath id="b8a8loV0a1rwYNwL">
                                                            <path d="M6.34817953,0 L94.98515634,0 C96.66879824,0 98.28348254,0.66882413 99.47399714,1.85933873 100.66451174,3.04985333 101.33333588,4.66453764 101.33333588,6.34817953 L101.33333588,122.07807474 C101.33333588,123.76171663 100.66451174,125.37640094 99.47399714,126.56691554 98.28348254,127.75743013 96.66879823,128.42625427 94.98515634,128.42625427 L6.34817953,128.42625427 C4.66453764,128.42625427 3.04985334,127.75743014 1.85933874,126.56691554 0.66882414,125.37640094 0,123.76171663 0,122.07807474 L0,6.34817953 C0,4.66453764 0.66882414,3.04985334 1.85933873,1.85933874 3.04985333,0.66882414 4.66453764,0 6.34817953,0 Z"></path>
                                                        </clipPath>
                                                        <path id="kMFIfqUfuWqC1GVP" d="M6.34817953,0 L94.98515634,0 C96.66879824,0 98.28348254,0.66882413 99.47399714,1.85933873 100.66451174,3.04985333 101.33333588,4.66453764 101.33333588,6.34817953 L101.33333588,122.07807474 C101.33333588,123.76171663 100.66451174,125.37640094 99.47399714,126.56691554 98.28348254,127.75743013 96.66879823,128.42625427 94.98515634,128.42625427 L6.34817953,128.42625427 C4.66453764,128.42625427 3.04985334,127.75743014 1.85933874,126.56691554 0.66882414,125.37640094 0,123.76171663 0,122.07807474 L0,6.34817953 C0,4.66453764 0.66882414,3.04985334 1.85933873,1.85933874 3.04985333,0.66882414 4.66453764,0 6.34817953,0 Z"
                                                        fill="url(#c54PUHKscPY7ttuV)"></path>
                                                        <path id="KvyB616o1SCiQKf1" d="M6.34817953,0 L94.98515634,0 C96.66879824,0 98.28348254,0.66882413 99.47399714,1.85933873 100.66451174,3.04985333 101.33333588,4.66453764 101.33333588,6.34817953 L101.33333588,122.07807474 C101.33333588,123.76171663 100.66451174,125.37640094 99.47399714,126.56691554 98.28348254,127.75743013 96.66879823,128.42625427 94.98515634,128.42625427 L6.34817953,128.42625427 C4.66453764,128.42625427 3.04985334,127.75743014 1.85933874,126.56691554 0.66882414,125.37640094 0,123.76171663 0,122.07807474 L0,6.34817953 C0,4.66453764 0.66882414,3.04985334 1.85933873,1.85933874 3.04985333,0.66882414 4.66453764,0 6.34817953,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#b3aaff;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg id="op9cIPQyxdvWXlKT" viewBox="0 0 87.0971 134.5205" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <defs>
                                                    <radialGradient id="iSQAhzb9wEkBmTVm" gradientUnits="userSpaceOnUse" cx="0" cy="0" r="161.14899938">
                                                        <stop offset="0%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                                        <stop offset="100%" stop-color="#ffffff" stop-opacity="1"></stop>
                                                    </radialGradient>
                                                </defs>
                                                <g id="B0kmsr9J6pT6upqZ" style="transform:scale(1, 1);">
                                                    <g id="U7QsRNjv905s9bzM" style="clip-path:url(index.html#ltmPZtoNVCcYhHgw);">
                                                        <clipPath id="ltmPZtoNVCcYhHgw">
                                                            <path d="M5.45633102,0 L81.64072251,0 C84.65417092,0 87.09705353,2.44288261 87.09705353,5.45633102 L87.09705353,129.0641768 C87.09705352,132.07762521 84.65417092,134.52050781 81.64072251,134.52050781 L5.45633102,134.52050781 C2.44288261,134.52050781 0,132.07762521 0,129.0641768 L0,5.45633102 C0,2.44288261 2.44288261,0 5.45633102,0 Z"></path>
                                                        </clipPath>
                                                        <path id="oL5lw9NCO5uEn6Cw" d="M5.45633102,0 L81.64072251,0 C84.65417092,0 87.09705353,2.44288261 87.09705353,5.45633102 L87.09705353,129.0641768 C87.09705352,132.07762521 84.65417092,134.52050781 81.64072251,134.52050781 L5.45633102,134.52050781 C2.44288261,134.52050781 0,132.07762521 0,129.0641768 L0,5.45633102 C0,2.44288261 2.44288261,0 5.45633102,0 Z"
                                                        fill="url(#iSQAhzb9wEkBmTVm)"></path>
                                                        <path id="yaLQxIRbyEDXFHLo" d="M5.45633102,0 L81.64072251,0 C84.65417092,0 87.09705353,2.44288261 87.09705353,5.45633102 L87.09705353,129.0641768 C87.09705352,132.07762521 84.65417092,134.52050781 81.64072251,134.52050781 L5.45633102,134.52050781 C2.44288261,134.52050781 0,132.07762521 0,129.0641768 L0,5.45633102 C0,2.44288261 2.44288261,0 5.45633102,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#b3aaff;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="PNt09xXxzabYoxKa" style="display:grid;position:relative;">
                                <div id="sZoG0z899Q33Zz34" style="z-index:11;">
                                    <div id="xMtUkZMa6mEnCd7d" style="box-sizing:border-box;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-9894ec31-f17b-4c3e-b0d4-66200ad18e55 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                <div id="hSMOlPoQrxXhkaEt" style="width:100%;height:100%;opacity:1.0;">
                                                    <div id="TsgROxxFb0JtWZPS" style="transform:scale(1, 1);width:100%;height:100%;overflow:hidden;position:relative;border-radius:6.61268919%/9.91903379%;">
                                                        <div id="dbbZxh6crpXHMFvV" style="width:calc(100% * max(1, var(--scale-fill, 1)));height:calc(184.61538462% / min(1, var(--scale-fill, 1)));position:absolute;top:50%;left:50%;opacity:1.0;animation:pulse 1.5s ease-in-out infinite;"><img src="{{asset('welcome/images/21f1126bc606a1a08a6942d6df47043b.jpg')}}" alt="Face of Technology" loading="lazy" style="width:100%;height:100%;display:block;object-fit:cover;object-position:50% 59.93055556%;transform:translate(-50%, -59.93055556%) rotate(0deg);"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="Slc0n9SSGiOOND4Z" style="display:grid;position:relative;grid-area:3 / 3 / 4 / 4;">
                                    <div id="jSi4bgf4XsviCO24" style="z-index:12;">
                                        <div id="T7NrANtbkCziDAHs" style="box-sizing:border-box;width:100%;height:100%;">
                                            <div class="animation_container" style="width:100%;height:100%;">
                                                <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-98a899bb-6aad-4824-ad02-9c0c04287f60 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                    <svg id="bkzGyUb0uBksH8zJ" viewBox="0 0 30.0159 10.7199" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                        <g id="HcreOymj2PynjUlo" style="transform:scale(1, 1);">
                                                            <path id="ymgNnGSIlEAaeatx" d="M5.35997486,0 L24.65588474,0 C27.61611712,0 30.0158596,2.39974249 30.0158596,5.35997486 L30.0158596,5.35997486 C30.0158596,6.78152858 29.45114959,8.14485916 28.44595931,9.15004943 27.44076904,10.15523971 26.07743846,10.71994972 24.65588474,10.71994972 L5.35997486,10.71994972 C3.93842114,10.71994972 2.57509056,10.15523971 1.56990029,9.15004943 0.56471001,8.14485916 0,6.78152858 0,5.35997486 L0,5.35997486 C0,3.93842114 0.56471002,2.57509056 1.56990029,1.56990029 2.57509056,0.56471002 3.93842114,0 5.35997486,0 Z"
                                                            style="fill:#ffffff;opacity:1.0;"></path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="hXJoE8hLzOiO3DuZ" style="z-index:14;">
                                        <div id="jR3jDzPurDZQF0UB" style="box-sizing:border-box;width:100%;height:100%;">
                                            <div class="animation_container" style="width:100%;height:100%;">
                                                <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-cad7ad20-f71f-471d-af6a-5a890fc081db 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                                    <div id="hrrNrYxZQKiGg65T" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                        <p id="cJJEbWIEnHuEL1kn" style="color:#13072e;font-family:YAFdtQJYB9w-1;line-height:1.37730507em;text-align:center;"><span id="PRNbdEdQwROM7RmQ" style="color:#13072e;">#trends</span>
                                                            <br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="i3wuHlGLiiyL4FaR" style="z-index:15;">
                                <div id="g9EKfI3sCASC559k" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-317cce02-262b-4c0e-b4ed-b749b8fff0ab 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="NG7IbKsVvYsjr6UH" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="jOFwdrOuA6WxB4tv" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.37730507em;"><span id="VNPnbEEv517qCWqn" style="color:#000000;">July 08, 2024</span>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="hVNaeOQCwL6Z4CGw" style="z-index:13;">
                                <div id="MrcMOPpY2tcTZfPJ" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-e909944b-aee4-4c07-a6d6-53aa87ffed75 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="hsKlVQLCKVCoLjh7" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="rNTqcO5WpRmzrIpc" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.19028135em;"><span id="FfDz8iMYs0WLnzLD" style="color:#000000;font-weight:800;">Cara mengajukan ​cuti</span>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="uP9IMK267M7aH8iI" style="z-index:16;">
                                <div id="xee3psyRdTeJsMyN" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div class="animated" style="width:100%;height:100%;animation:rise-RIGHT-401aaa69-cc6b-4f8f-a408-5cb8c212e158 1000ms 100ms both paused, linear_fade 400ms linear both paused;">
                                            <div id="Q7QErkrIl68p5tXp" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="PSAGtJgl5Byp1hAU" style="color:#000000;font-family:YAFdtQJYB9w-1;line-height:1.37730507em;"><a id="GJNHEv2lfU2w9kCR" target="_blank" rel="noopener" href="{{ route('filament.employee.auth.login') }}" style="color:#000000;pointer-events:all;" data-interstitial-link="">Baca selengkapnya →</a>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <a id="page-4" aria-hidden="true" style="visibility:hidden;"></a>
        <section id="qzd8VU6LMBUQrqqK" style="position:relative;overflow:hidden;display:grid;align-items:center;grid-template-columns:auto 100rem auto;z-index:0;margin-top:-1px;">
            <div id="fflCdGxa7AWlVsTz" style="grid-area:1 / 1 / 2 / 4;display:grid;position:absolute;min-height:100%;min-width:100%;">
                <div id="byeUiwC9BvOBWcN3" style="z-index:0;">
                    <div id="KUZ01kVL8gdEjhpO" style="box-sizing:border-box;width:100%;height:100%;transform:rotate(0deg);">
                        <div id="O8UejaJwoP0B4AJH" style="width:100%;height:100%;opacity:1.0;">
                            <div id="Y58dNBBMOTidFHeb" style="transform:scale(1, 1);width:100%;height:100%;overflow:hidden;position:relative;">
                                {{-- <svg id="iaZO9JpRHYahny27" viewBox="0 0 1366.0 768.0" preserveAspectRatio="none" style="width:100%;height:100%;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                    <defs>
                                        <linearGradient id="RluHCxWQ6qCLepqn" gradientUnits="userSpaceOnUse" x1="0" y1="384" x2="1366" y2="384">
                                            <stop offset="0%" stop-color="#13072e" stop-opacity="1"></stop>
                                            <stop offset="100%" stop-color="#f87d2d" stop-opacity="1"></stop>
                                        </linearGradient>
                                    </defs>
                                    <rect id="DYjq0m7iPMKuvlLa" width="1366" height="768" style="fill:url(index.html#RluHCxWQ6qCLepqn);"></rect>
                                </svg> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="zJUG6V5RLKXOh9rD" style="display:grid;position:relative;grid-area:1 / 2 / 2 / 3;">
                <div id="FLcWLqBZDk8Lf2Dr">
                    <div id="fd3TKZzhdgP5EXat" style="display:grid;position:relative;grid-area:2 / 2 / 3 / 3;">
                        <div id="kc55mE5rTYrFEQ4Z" style="z-index:1;">
                            <div id="Gg7IRylDTwwMG6dD" style="box-sizing:border-box;width:100%;height:100%;">
                                <div class="animation_container" style="width:100%;height:100%;">
                                    <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                        <div class="animated" style="width:100%;height:100%;animation:baseline-LEFT-8b03631c-7cb7-4274-986d-b2765c510655 602ms 100ms both paused;">
                                            <svg id="QAJdAijEtyhZTvuQ" viewBox="0 0 341.3333 156.5632" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <g id="vXAizyqBTAjCO7Cv" style="transform:scale(1, 1);">
                                                    <g id="o1cvs5ECxwEVef7q" style="clip-path:url(index.html#lzfUwl9JVdxsRsRE);">
                                                        <clipPath id="lzfUwl9JVdxsRsRE">
                                                            <path d="M13.7904623,0 L327.5428812,0 C331.20033921,0 334.70799726,1.45291953 337.29421062,4.03913289 339.88042397,6.62534625 341.33334351,10.13300429 341.33334351,13.7904623 L341.33334351,142.77275486 C341.33334351,146.43021286 339.88042397,149.93787091 337.29421061,152.52408427 334.70799725,155.11029763 331.20033921,156.56321716 327.5428812,156.56321716 L13.7904623,156.56321716 C10.1330043,156.56321716 6.62534625,155.11029763 4.03913289,152.52408427 1.45291953,149.93787091 0,146.43021287 0,142.77275486 L0,13.7904623 C0,10.1330043 1.45291953,6.62534625 4.03913289,4.03913289 6.62534625,1.45291954 10.13300429,0 13.7904623,0 Z"></path>
                                                        </clipPath>
                                                        <path id="oFhIuYQMzPBUi4yz" d="M13.7904623,0 L327.5428812,0 C331.20033921,0 334.70799726,1.45291953 337.29421062,4.03913289 339.88042397,6.62534625 341.33334351,10.13300429 341.33334351,13.7904623 L341.33334351,142.77275486 C341.33334351,146.43021286 339.88042397,149.93787091 337.29421061,152.52408427 334.70799725,155.11029763 331.20033921,156.56321716 327.5428812,156.56321716 L13.7904623,156.56321716 C10.1330043,156.56321716 6.62534625,155.11029763 4.03913289,152.52408427 1.45291953,149.93787091 0,146.43021287 0,142.77275486 L0,13.7904623 C0,10.1330043 1.45291953,6.62534625 4.03913289,4.03913289 6.62534625,1.45291954 10.13300429,0 13.7904623,0 Z"
                                                        style="fill:#ffffff;opacity:1.0;"></path>
                                                        <path id="vCcyUaWOm0zbJzKF" d="M13.7904623,0 L327.5428812,0 C331.20033921,0 334.70799726,1.45291953 337.29421062,4.03913289 339.88042397,6.62534625 341.33334351,10.13300429 341.33334351,13.7904623 L341.33334351,142.77275486 C341.33334351,146.43021286 339.88042397,149.93787091 337.29421061,152.52408427 334.70799725,155.11029763 331.20033921,156.56321716 327.5428812,156.56321716 L13.7904623,156.56321716 C10.1330043,156.56321716 6.62534625,155.11029763 4.03913289,152.52408427 1.45291953,149.93787091 0,146.43021287 0,142.77275486 L0,13.7904623 C0,10.1330043 1.45291953,6.62534625 4.03913289,4.03913289 6.62534625,1.45291954 10.13300429,0 13.7904623,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#b3aaff;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg id="VeRIkuhtxysb2Pnm" viewBox="0 0 264.7769 167.5089" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <g id="nuYjPnqx74weudd4" style="transform:scale(1, 1);">
                                                    <g id="VuAwYnw741DXRcMh" style="clip-path:url(index.html#bvOvAaBoZ4ECtxBZ);">
                                                        <clipPath id="bvOvAaBoZ4ECtxBZ">
                                                            <path d="M10.69744985,0 L254.07946666,0 C259.98750507,0 264.7769165,4.78941144 264.7769165,10.69744985 L264.7769165,156.81144603 C264.7769165,162.71948444 259.98750507,167.50889587 254.07946666,167.50889587 L10.69744985,167.50889587 C4.78941144,167.50889587 0,162.71948444 0,156.81144603 L0,10.69744985 C0,4.78941144 4.78941144,0 10.69744985,0 Z"></path>
                                                        </clipPath>
                                                        <path id="YijDKGbIrZ4RNEGS" d="M10.69744985,0 L254.07946666,0 C259.98750507,0 264.7769165,4.78941144 264.7769165,10.69744985 L264.7769165,156.81144603 C264.7769165,162.71948444 259.98750507,167.50889587 254.07946666,167.50889587 L10.69744985,167.50889587 C4.78941144,167.50889587 0,162.71948444 0,156.81144603 L0,10.69744985 C0,4.78941144 4.78941144,0 10.69744985,0 Z"
                                                        style="fill:#ffffff;opacity:1.0;"></path>
                                                        <path id="SnbH79NnbjQdaUha" d="M10.69744985,0 L254.07946666,0 C259.98750507,0 264.7769165,4.78941144 264.7769165,10.69744985 L264.7769165,156.81144603 C264.7769165,162.71948444 259.98750507,167.50889587 254.07946666,167.50889587 L10.69744985,167.50889587 C4.78941144,167.50889587 0,162.71948444 0,156.81144603 L0,10.69744985 C0,4.78941144 4.78941144,0 10.69744985,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#b3aaff;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg id="ncA36ZxB0gMTeXFc" viewBox="0 0 194.1697 222.3421" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <g id="eN4H2RrakddyLAxZ" style="transform:scale(1, 1);">
                                                    <g id="pYi1UociPBhLAazA" style="clip-path:url(index.html#MGdjPn74xj7RBSrQ);">
                                                        <clipPath id="MGdjPn74xj7RBSrQ">
                                                            <path d="M7.84479548,0 L186.32492803,0 C190.65748894,0 194.16972351,3.51223457 194.16972351,7.84479548 L194.16972351,214.49733709 C194.16972351,216.57790621 193.34322065,218.57326064 191.87203611,220.04444517 190.40085158,221.51562971 188.40549715,222.34213257 186.32492803,222.34213257 L7.84479548,222.34213257 C3.51223457,222.34213257 0,218.829898 0,214.49733709 L0,7.84479548 C0,3.51223457 3.51223457,0 7.84479548,0 Z"></path>
                                                        </clipPath>
                                                        <path id="Bl6atrZ7cCIKycbX" d="M7.84479548,0 L186.32492803,0 C190.65748894,0 194.16972351,3.51223457 194.16972351,7.84479548 L194.16972351,214.49733709 C194.16972351,216.57790621 193.34322065,218.57326064 191.87203611,220.04444517 190.40085158,221.51562971 188.40549715,222.34213257 186.32492803,222.34213257 L7.84479548,222.34213257 C3.51223457,222.34213257 0,218.829898 0,214.49733709 L0,7.84479548 C0,3.51223457 3.51223457,0 7.84479548,0 Z"
                                                        style="fill:#ffffff;opacity:1.0;"></path>
                                                        <path id="t6TqvJ4f7bHz6xTp" d="M7.84479548,0 L186.32492803,0 C190.65748894,0 194.16972351,3.51223457 194.16972351,7.84479548 L194.16972351,214.49733709 C194.16972351,216.57790621 193.34322065,218.57326064 191.87203611,220.04444517 190.40085158,221.51562971 188.40549715,222.34213257 186.32492803,222.34213257 L7.84479548,222.34213257 C3.51223457,222.34213257 0,218.829898 0,214.49733709 L0,7.84479548 C0,3.51223457 3.51223457,0 7.84479548,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#b3aaff;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg id="N7olFcNEoSbmwvA7" viewBox="0 0 123.5626 220.9263" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <g id="kkkMTWoIoXIqFOMT" style="transform:scale(1, 1);">
                                                    <g id="uHfYuE6WV5tQPLoE" style="clip-path:url(index.html#kwHR7Jnc3O0P6Sfk);">
                                                        <clipPath id="kwHR7Jnc3O0P6Sfk">
                                                            <path d="M4.99214515,0 L118.57040826,0 C119.89440747,0 121.16417912,0.52595664 122.10038795,1.46216546 123.03659677,2.39837428 123.56255341,3.66814594 123.56255341,4.99214515 L123.56255341,215.9341549 C123.56255341,218.69124053 121.32749389,220.92630005 118.57040826,220.92630005 L4.99214515,220.92630005 C2.23505951,220.92630005 0,218.69124053 0,215.9341549 L0,4.99214515 C0,2.23505951 2.23505952,0 4.99214515,0 Z"></path>
                                                        </clipPath>
                                                        <path id="rbiy4rHA6kGh31D3" d="M4.99214515,0 L118.57040826,0 C119.89440747,0 121.16417912,0.52595664 122.10038795,1.46216546 123.03659677,2.39837428 123.56255341,3.66814594 123.56255341,4.99214515 L123.56255341,215.9341549 C123.56255341,218.69124053 121.32749389,220.92630005 118.57040826,220.92630005 L4.99214515,220.92630005 C2.23505951,220.92630005 0,218.69124053 0,215.9341549 L0,4.99214515 C0,2.23505951 2.23505952,0 4.99214515,0 Z"
                                                        style="fill:#ffffff;opacity:1.0;"></path>
                                                        <path id="tsbGrCEhi5puuQmm" d="M4.99214515,0 L118.57040826,0 C119.89440747,0 121.16417912,0.52595664 122.10038795,1.46216546 123.03659677,2.39837428 123.56255341,3.66814594 123.56255341,4.99214515 L123.56255341,215.9341549 C123.56255341,218.69124053 121.32749389,220.92630005 118.57040826,220.92630005 L4.99214515,220.92630005 C2.23505951,220.92630005 0,218.69124053 0,215.9341549 L0,4.99214515 C0,2.23505951 2.23505952,0 4.99214515,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#b3aaff;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <svg id="q0eIHttbZzLKCYB7" viewBox="0 0 94.6026 324.3757" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                <g id="JtsRcKjbTRpe5CAn" style="transform:scale(1, 1);">
                                                    <g id="jcmvMKJ9g3Xb2S95" style="clip-path:url(index.html#j6iFKxBNVsEcb1FO);">
                                                        <clipPath id="j6iFKxBNVsEcb1FO">
                                                            <path d="M3.8221105,0 L90.78046671,0 C92.89136005,0 94.60257721,1.71121716 94.60257721,3.8221105 L94.60257721,320.55353037 C94.60257721,322.66442371 92.89136005,324.37564087 90.78046671,324.37564087 L3.8221105,324.37564087 C1.71121716,324.37564087 0,322.66442371 0,320.55353037 L0,3.8221105 C0,1.71121716 1.71121716,0 3.8221105,0 Z"></path>
                                                        </clipPath>
                                                        <path id="Rf1FK7jd0Xem1EqT" d="M3.8221105,0 L90.78046671,0 C92.89136005,0 94.60257721,1.71121716 94.60257721,3.8221105 L94.60257721,320.55353037 C94.60257721,322.66442371 92.89136005,324.37564087 90.78046671,324.37564087 L3.8221105,324.37564087 C1.71121716,324.37564087 0,322.66442371 0,320.55353037 L0,3.8221105 C0,1.71121716 1.71121716,0 3.8221105,0 Z"
                                                        style="fill:#ffffff;opacity:1.0;"></path>
                                                        <path id="WBY0dh0jbDNFzCPQ" d="M3.8221105,0 L90.78046671,0 C92.89136005,0 94.60257721,1.71121716 94.60257721,3.8221105 L94.60257721,320.55353037 C94.60257721,322.66442371 92.89136005,324.37564087 90.78046671,324.37564087 L3.8221105,324.37564087 C1.71121716,324.37564087 0,322.66442371 0,320.55353037 L0,3.8221105 C0,1.71121716 1.71121716,0 3.8221105,0 Z"
                                                        style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#b3aaff;"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="dYJ6zpRpd6GhD7ZB" style="z-index:2;">
                            <div id="Jzdf6mxCHP2YrCoj" style="box-sizing:border-box;width:100%;height:100%;">
                                <div class="animation_container" style="width:100%;height:100%;">
                                    <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                        <div class="animated" style="width:100%;height:100%;animation:baseline-LEFT-c8086509-1a65-44bd-bb12-2453be2378c0 602ms 100ms both paused;">
                                            <div id="FFFKPahcEp6oIkqL" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="WjgpTk88gmSh5zbB" style="color:#13072e;font-family:YAFdJjbTu24-1;line-height:1.3574818em;"><span id="P5ZedjcI5gfC0sCk" style="color:#13072e;font-weight:700;">My Shap</span>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="ejpGDZRbXh6URGuQ" style="z-index:17;">
                            <div id="e19vlehVqFE9VENo" style="box-sizing:border-box;width:100%;height:100%;">
                                <div class="animation_container" style="width:100%;height:100%;">
                                    <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                        <div class="animated" style="width:100%;height:100%;animation:baseline-LEFT-8be81904-c95e-4261-9542-d9db40b235de 602ms 100ms both paused;">
                                            <div id="zqNQ8sU04mTKFFf1" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="HOALOy9kYJzdBNkB" style="color:#13072e;font-family:YAFdJjbTu24-1;line-height:1.3574818em;"><span id="SjGuBXtXmtzpxDQo" style="color:#13072e;">Tetap ikuti perkembangannya dan ​daftar untuk buletin Shap:</span>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="CilXxuxanKmvDIHB" style="display:grid;position:relative;">
                            <div id="jbIR0ATDEVz5TVPg" style="display:grid;position:relative;grid-area:2 / 2 / 3 / 3;">
                                <div id="l6zRKlZwjZcdPdkT" style="z-index:19;">
                                    <div id="Mzz9QdutePQFGkCm" style="box-sizing:border-box;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                                <div class="animated" style="width:100%;height:100%;animation:baseline-LEFT-7e8c9b5b-810e-43d5-a608-809655214f42 602ms 100ms both paused;">
                                                    <svg id="SsRSGrS49GjC3M8m" viewBox="0 0 101.3333 16.0" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                        <g id="zwWx3bid8wD7Hg6a" style="transform:scale(1, 1);">
                                                            <g id="r0EpNE1FeInuGMun" style="clip-path:url(index.html#hSdtVkk4F97YXXtx);">
                                                                <clipPath id="hSdtVkk4F97YXXtx">
                                                                    <path d="M8,0 L93.33333588,0 C95.4550678,0 97.4898991,0.84285472 98.99019013,2.34314575 100.49048116,3.84343678 101.33333588,5.87826808 101.33333588,8 L101.33333588,8 C101.33333588,12.418278 97.75161388,16 93.33333588,16 L8,16 C3.581722,16 0,12.418278 0,8 L0,8 C0,3.581722 3.581722,0 8,0 Z"></path>
                                                                </clipPath>
                                                                <path id="btlmp0QGO5nPXJzg" d="M8,0 L93.33333588,0 C95.4550678,0 97.4898991,0.84285472 98.99019013,2.34314575 100.49048116,3.84343678 101.33333588,5.87826808 101.33333588,8 L101.33333588,8 C101.33333588,12.418278 97.75161388,16 93.33333588,16 L8,16 C3.581722,16 0,12.418278 0,8 L0,8 C0,3.581722 3.581722,0 8,0 Z"
                                                                style="fill:#ffffff;opacity:1.0;"></path>
                                                                <path id="TJYskELS9BHcPOuc" d="M8,0 L93.33333588,0 C95.4550678,0 97.4898991,0.84285472 98.99019013,2.34314575 100.49048116,3.84343678 101.33333588,5.87826808 101.33333588,8 L101.33333588,8 C101.33333588,12.418278 97.75161388,16 93.33333588,16 L8,16 C3.581722,16 0,12.418278 0,8 L0,8 C0,3.581722 3.581722,0 8,0 Z"
                                                                style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#13072e;"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <svg id="L4U1Kdk7rmj8bAVt" viewBox="0 0 81.3637 37.5411" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                        <g id="lD85ZuJqjLJ34BVH" style="transform:scale(1, 1);">
                                                            <g id="PHd85rtj6xjPFQSf" style="clip-path:url(index.html#jEVJRSOsc7l4iEao);">
                                                                <clipPath id="jEVJRSOsc7l4iEao">
                                                                    <path d="M6.64367653,0 L74.72006248,0 C78.38926371,0 81.36373901,2.9744753 81.36373901,6.64367653 L81.36373901,30.89738106 C81.36373901,32.65939363 80.66378225,34.34923875 79.41785121,35.59516979 78.17192017,36.84110082 76.48207505,37.54105759 74.72006248,37.54105759 L6.64367653,37.54105759 C2.9744753,37.54105759 0,34.56658229 0,30.89738106 L0,6.64367653 C0,4.88166396 0.69995677,3.19181884 1.9458878,1.9458878 3.19181884,0.69995677 4.88166396,0 6.64367653,0 Z"></path>
                                                                </clipPath>
                                                                <path id="YQMmfV24pvzfieW6" d="M6.64367653,0 L74.72006248,0 C78.38926371,0 81.36373901,2.9744753 81.36373901,6.64367653 L81.36373901,30.89738106 C81.36373901,32.65939363 80.66378225,34.34923875 79.41785121,35.59516979 78.17192017,36.84110082 76.48207505,37.54105759 74.72006248,37.54105759 L6.64367653,37.54105759 C2.9744753,37.54105759 0,34.56658229 0,30.89738106 L0,6.64367653 C0,4.88166396 0.69995677,3.19181884 1.9458878,1.9458878 3.19181884,0.69995677 4.88166396,0 6.64367653,0 Z"
                                                                style="fill:#ffffff;opacity:1.0;"></path>
                                                                <path id="GfiBqooDfEpHZsZm" d="M6.64367653,0 L74.72006248,0 C78.38926371,0 81.36373901,2.9744753 81.36373901,6.64367653 L81.36373901,30.89738106 C81.36373901,32.65939363 80.66378225,34.34923875 79.41785121,35.59516979 78.17192017,36.84110082 76.48207505,37.54105759 74.72006248,37.54105759 L6.64367653,37.54105759 C2.9744753,37.54105759 0,34.56658229 0,30.89738106 L0,6.64367653 C0,4.88166396 0.69995677,3.19181884 1.9458878,1.9458878 3.19181884,0.69995677 4.88166396,0 6.64367653,0 Z"
                                                                style="fill:none;stroke-linecap:butt;vector-effect:non-scaling-stroke;stroke:#13072e;"></path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="fSp3tJHbfvfuk0Yx" style="z-index:20;">
                                    <div id="KLUaiyefaNQg46EE" style="box-sizing:border-box;width:100%;height:100%;">
                                        <div class="animation_container" style="width:100%;height:100%;">
                                            <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                                <div class="animated" style="width:100%;height:100%;animation:baseline-LEFT-0b8700d8-1d4e-4bbd-a6e6-6fbfed106822 602ms 100ms both paused;">
                                                    <div id="tUJ65Y2LpxIXHu0H" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                        <p id="snoFMIAKzZCvVKXm" style="color:#adacb8;font-family:YAFdJjbTu24-1;line-height:1.38517809em;"><span id="W5WJqpLM5AQ81KhM" style="color:#adacb8;">Enter your email</span>
                                                            <br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="eo7aouRIFkqae6gd" style="display:grid;position:relative;">
                                    <div id="cgsVmTUWAAMzyWFM" style="z-index:21;">
                                        <div id="A3GrJc2sDCYUYNkG" style="box-sizing:border-box;width:100%;height:100%;">
                                            <div class="animation_container" style="width:100%;height:100%;">
                                                <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                                    <div class="animated" style="width:100%;height:100%;animation:baseline-LEFT-ecd34de2-263f-4537-bf5b-a867d73196b1 602ms 100ms both paused;">
                                                        <svg id="MEssNTyXJmEaeND7" viewBox="0 0 64.0 64.0" preserveAspectRatio="none" style="width:100%;height:100%;opacity:1.0;overflow:hidden;position:absolute;top:0%;left:0%;background:url('data:image/png;base64,');">
                                                            <g id="XJbEtjcehtTuSlHT" style="transform:scale(1, 1);">
                                                                <path id="Nvdmv5t9W2QPm9Jv" d="M32,0 C14.32688808,0 0,14.32688808 0,32 C0,49.67311096 14.32688808,64 32,64 C49.67311096,64 64,49.67311096 64,32 C64,14.32688808 49.67311096,0 32,0 Z" style="fill:#f87d2d;opacity:1.0;"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="SfbaCb6DPea3FgyS" style="z-index:22;">
                                        <div id="Ns72ueYUlOToWIxA" style="padding-top:79.625%;">
                                            <div id="LPlEzBgejfKXiRKP" style="position:absolute;top:0px;left:0px;width:100%;height:100%;">
                                                <div class="animation_container" style="width:100%;height:100%;">
                                                    <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                                        <div class="animated" style="width:100%;height:100%;animation:baseline-LEFT-f905cae2-778a-43bc-908a-a5f2012e148e 602ms 100ms both paused;">
                                                            <div id="eZvXyhmJxs8BFZpL" style="width:100%;height:100%;opacity:1.0;">
                                                                <div id="GU8ObhEZvlB86rTC" style="transform:scale(1, 1);width:100%;height:100%;overflow:hidden;position:relative;">
                                                                    <div id="iwHy6YmCnWUPkOrK" style="width:calc(100% * max(1, var(--scale-fill, 1)));height:calc(100% / min(1, var(--scale-fill, 1)));position:absolute;top:50%;left:50%;opacity:1.0;animation:pulse 1.5s ease-in-out infinite;"><img src="{{asset('welcome/images/e20632dd00b5ed7bf02fcce8d2c37eac.svg')}}" alt="Black Basic Short Arrow Right" loading="lazy" style="width:100%;height:100%;display:block;object-fit:cover;object-position:50% 50%;transform:translate(-50%, -50%) rotate(0deg);"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="RegHy93onCRN9He2" style="display:grid;position:relative;">
                            <div id="eeZfbrdyolGLY2H8" style="z-index:10;">
                                <div id="kNqEhWCL2LLockBn" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                            <div class="animated" style="width:100%;height:100%;animation:baseline-RIGHT-b79e2da2-cfbf-4daa-ada7-71db773c4af3 602ms 100ms both paused;">
                                                <div id="qngAYOpR7QYVAMit" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                    <p id="QrlC8uALiZN2wluC" style="color:#13072e;font-family:YAFdJjbTu24-1;line-height:1.38517809em;"><span id="Yrov6kxlcul3aAwu" style="color:#13072e;font-weight:700;">Documentation</span>
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="BRi8klwHVylipzKy" style="z-index:6;">
                                <div id="b6PORqWAaCeUdD1Q" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                            <div class="animated" style="width:100%;height:100%;animation:baseline-RIGHT-075bea08-d3fd-4553-9668-c769c8e37e45 602ms 100ms both paused;">
                                                <div id="QMUlCaIAbcacx3nJ" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                    <p id="nGJfZMsLEg62askW" style="color:#13072e;font-family:YAFdJjbTu24-1;line-height:1.38517809em;"><span id="PSqJHZSZgbywPiZl" style="color:#13072e;">Home</span>
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="MLuoB1EwVWSRPbe8" style="z-index:7;">
                                <div id="QqKFW34CLWEW33sE" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                            <div class="animated" style="width:100%;height:100%;animation:baseline-RIGHT-2d049585-b426-4652-a080-1be46b1ecd1b 602ms 100ms both paused;">
                                                <div id="DC4iNOAmuPICQgI1" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                    <p id="lIjJGbgC3ht61wT4" style="color:#13072e;font-family:YAFdJjbTu24-1;line-height:1.38517809em;"><span id="jcgUoCmHQ4cGAUI0" style="color:#13072e;">Fitur</span>
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="iOB0bMzuucfjdgVE" style="z-index:8;">
                                <div id="uFxO3CeHLWN3D5TI" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                            <div class="animated" style="width:100%;height:100%;animation:baseline-RIGHT-a765b37a-f366-4a7c-b88c-f5467e8e59bb 602ms 100ms both paused;">
                                                <div id="jLdEBdxRWn2ed9My" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                    <p id="qMTAXJBzMWQOnUJB" style="color:#13072e;font-family:YAFdJjbTu24-1;line-height:1.38517969em;"><span id="woBeWm45O6zqckBJ" style="color:#13072e;">Panduan</span>
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="XerVwiTzOnj1ndrB" style="z-index:9;">
                                <div id="PdLWL2JkvRGxrsDs" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                            <div class="animated" style="width:100%;height:100%;animation:baseline-RIGHT-939f92b5-046f-42bf-9189-c39168f897ae 602ms 100ms both paused;">
                                                <div id="qfc0EEBIXHpKBunJ" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                    <p id="TXKCbPFUS7m2a3CN" style="color:#13072e;font-family:YAFdJjbTu24-1;line-height:1.38517809em;"><span id="Btl4a1n28d7UoZkB" style="color:#13072e;">Privacy Policy</span>
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="leeZ9Uv6soUhCzSG" style="display:grid;position:relative;">
                            <div id="PGEY2hmMAzNHut2h" style="z-index:16;">
                                <div id="EsPJnaREaGLHHzRn" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                            <div class="animated" style="width:100%;height:100%;animation:baseline-RIGHT-f93dc94e-ffaf-4464-b415-3abfff8b5f37 602ms 100ms both paused;">
                                                <div id="Uu0UKhTH0htC1onc" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                    <p id="FvF2w0aWz24auuG7" style="color:#13072e;font-family:YAFdJjbTu24-1;line-height:1.38517809em;"><span id="QptGMlHShax4ZfX8" style="color:#13072e;font-weight:700;">Social</span>
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="aaavrBqbl11TgMoL" style="z-index:12;">
                                <div id="W4eXJK30hs9P1eNQ" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                            <div class="animated" style="width:100%;height:100%;animation:baseline-RIGHT-748e20d9-a2ca-4f50-86af-94a89ddbc1a8 602ms 100ms both paused;">
                                                <div id="T0HnojiwqV5rpRlP" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                    <p id="YEEJ8HPIopkhz7H9" style="color:#13072e;font-family:YAFdJjbTu24-1;line-height:1.38517809em;"><span id="L7lzgsX5qXdhCHAI" style="color:#13072e;">Facebook</span>
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="G1vK8XrNa6bj5aSt" style="z-index:13;">
                                <div id="PRJ2xV9f03Y4AnuQ" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                            <div class="animated" style="width:100%;height:100%;animation:baseline-RIGHT-669817ec-cdd3-4aaf-8592-8e3f77ba929d 602ms 100ms both paused;">
                                                <div id="CN5TeBpYF4RzRDv4" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                    <p id="sU6FVdnbrOiwKoYw" style="color:#13072e;font-family:YAFdJjbTu24-1;line-height:1.38517809em;"><span id="MQaf1WutuyNBRQCV" style="color:#13072e;">Instagram</span>
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="UfStb5fZlJfDcXYO" style="z-index:14;">
                                <div id="fp0wnzq0ImOaGUSd" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                            <div class="animated" style="width:100%;height:100%;animation:baseline-RIGHT-14c45c95-1282-49db-b4e9-b436364b79c6 602ms 100ms both paused;">
                                                <div id="VKAX32e5aCFSODUk" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                    <p id="bbyauOFVwzc3cJTc" style="color:#13072e;font-family:YAFdJjbTu24-1;line-height:1.38517809em;"><span id="ZIyglrqQ1BNK1Hru" style="color:#13072e;">Youtube</span>
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="IVenE7bGtGozmTKn" style="z-index:15;">
                                <div id="NdlRGXAxRzplDsPy" style="box-sizing:border-box;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                            <div class="animated" style="width:100%;height:100%;animation:baseline-RIGHT-3f10b56b-1d00-461f-8f18-e3abc275b695 602ms 100ms both paused;">
                                                <div id="ph85UOPDTz831QMu" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                    <p id="XLREt06kECZK0e1a" style="color:#13072e;font-family:YAFdJjbTu24-1;line-height:1.38517809em;"><span id="UIBD2wLtwChbWWXZ" style="color:#13072e;">Li​nkedIn</span>
                                                        <br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="jmYp1csnqKwYanlG" style="z-index:23;">
                            <div id="G7LW0SbrBsRQJpGG" style="padding-top:0.08783735%;">
                                <div id="ZKbAyYEFZlMCKBVH" style="position:absolute;top:0px;left:0px;width:100%;height:100%;">
                                    <div class="animation_container" style="width:100%;height:100%;">
                                        <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                            <div class="animated" style="width:100%;height:100%;animation:baseline-RIGHT-de87e4e3-06b0-4723-9435-f586f24d066d 602ms 100ms both paused;">
                                                <svg id="uIs1u5oBqMN30JkX" viewBox="0 0 1138.467886020229 1.0" preserveAspectRatio="none" style="display:block;width:100%;height:100%;overflow:visible;opacity:1.0;min-height:1px;stroke:#adacb8;fill:#adacb8;background:url('data:image/png;base64,');">
                                                    <g id="pDdlTNjmVYA8fpBN">
                                                        <path d="M0,0.5 L1138.46788602,0.5" style="fill:none;stroke-width:1px;stroke-linecap:butt;"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="RM3os7FXHkJjUgbH" style="z-index:3;">
                            <div id="gbsHZUU69ZJQC7Vm" style="box-sizing:border-box;width:100%;height:100%;">
                                <div class="animation_container" style="width:100%;height:100%;">
                                    <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                        <div class="animated" style="width:100%;height:100%;animation:baseline-LEFT-e1460327-0f33-44ba-8906-6746da7e42fc 602ms 100ms both paused;">
                                            <div id="ofrowhTgBguTCoqv" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="xF5BAaeLwqpNGWeG" style="color:#13072e;font-family:YAFdJjbTu24-1;line-height:1.38517809em;"><span id="tezuTWSlXUfjSxLr" style="color:#13072e;">© MyShap Inc. All Rights Reserved 2024</span>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="vJtAUl7TnrEeXB4x" style="z-index:4;">
                            <div id="n5RBzQzdqnDSmjTf" style="box-sizing:border-box;width:100%;height:100%;">
                                <div class="animation_container" style="width:100%;height:100%;">
                                    <div style="width:100%;height:100%;transform:rotate(0deg);overflow:hidden;">
                                        <div class="animated" style="width:100%;height:100%;animation:baseline-RIGHT-96947d76-5e2f-491e-a258-d22de871d73f 602ms 100ms both paused;">
                                            <div id="DlOSXHLCexBDDi2b" style="opacity:1.0;display:flex;box-sizing:border-box;flex-direction:column;justify-content:flex-start;width:100%;height:100%;">
                                                <p id="ZukQYZ71ZKRM7URK" style="color:#13072e;font-family:YAFdJjbTu24-1;line-height:1.38517809em;text-align:right;"><span id="L15oL53BEUQTCgVf" style="color:#13072e;">Terms &amp; Conditions</span>
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="{{asset('welcome/js/939898b427480d700449229ff00dbb8a6f9f77442b532f697866e6914ab8843a.js')}}" async="" nonce="a5aaf8d7-92f6-4ea7-8e55-8d034d24b8ff"></script>
        <script src="{{asset('welcome/js/388fb330498371d4935abbff11d34d4c30842ca3c4a128cdd290d29db98acb41.js')}}" async="" nonce="a5aaf8d7-92f6-4ea7-8e55-8d034d24b8ff"></script>
    </div>
    <script nonce="a5aaf8d7-92f6-4ea7-8e55-8d034d24b8ff">
        const lang = navigator.language ? navigator.language : 'en';
          const loaded = new Promise((resolve) => {
            if (document.readyState === 'loading') {
              window.addEventListener('DOMContentLoaded', resolve);
              return;
            }
            resolve();
          })
          Promise.all([fetch('_footer?lang=' + encodeURIComponent(lang)), loaded]).then(([response]) => {
            if (response.status !== 200) {
              return;
            }
            response.text().then(footerStr => {
              const div = document.createElement('div');
              div.innerHTML = footerStr;
              for (const child of [...div.children]) {
                if (child.tagName.toLowerCase() !== 'script') {
                  document.body.append(child);
                }
              }

              (() => { !function(e){"use strict";const t=document.getElementById("modal_backdrop"),n=document.getElementById("modal"),o=document.getElementById("captcha-form"),c=document.getElementById("report_button"),d=document.getElementById("form_report"),s=document.getElementById("form_cancel"),l=document.getElementById("form_submit_reason"),a=document.getElementById("form_go_back"),r=document.getElementById("form_submit_captcha"),m=document.getElementById("form_close"),i=document.getElementById("form_close_initial"),u=document.getElementById("report_reason_0"),p=document.getElementById("error_message"),_=document.getElementById("error_message_captcha"),y=new Map;y.set(0,document.getElementById("form_step_terms")),y.set(1,document.getElementById("form_step_report_reason")),y.set(4,document.getElementById("form_step_report_other"));const E=document.getElementById("form_step_report_ip");E&&y.set(5,E),y.set(2,document.getElementById("form_step_captcha")),y.set(3,document.getElementById("form_step_success"));const f=document.getElementById("report_reason_4"),g=document.getElementById("form_close_ip"),h=document.getElementById("form_go_back_ip"),I=document.getElementById("report_reason_other"),k=document.getElementById("form_close_other"),w=document.getElementById("form_go_back_other");function v(){t.classList.remove("active"),n.classList.remove("active"),c.classList.remove("active"),c.focus()}function B(e){y.forEach(((t,n)=>{n===e?(t.style.display="block",L(t)):t.style.display="none"}))}let b,C=!1;const T="NETEASE"===window.C_CAPTCHA_IMPLEMENTATION?()=>b:()=>{const e=o.elements.namedItem("g-recaptcha-response");return null==e?void 0:e.value};t.onclick=v,s.onclick=v,m.onclick=v,i.onclick=v,g&&(g.onclick=v),k.onclick=v,c.onclick=function(){y.forEach(((e,t)=>{e.style.display=0===t?"block":"none"})),t.classList.add("active"),n.classList.add("active"),c.classList.add("active"),u.checked=!0,setTimeout((()=>{L(y.get(0))}),350)},d.onclick=d.dataset.reportUrl?function(){const{origin:e,pathname:t}=window.location,n=e+t,o=d.dataset.reportUrl+encodeURIComponent(n);window.open(o)}:()=>B(1),l.onclick=()=>{null!=E&&f.checked?B(5):I.checked?B(4):(B(2),function(){if(C)return;const e=document.createElement("script");e.src="NETEASE"===window.C_CAPTCHA_IMPLEMENTATION?"https://cstaticdun.126.net/load.min.js":"https://www.google.com/recaptcha/api.js",e.async=!0,e.defer=!0,document.head.appendChild(e),C=!0,e.onload="NETEASE"===window.C_CAPTCHA_IMPLEMENTATION?()=>{var e;null===(e=window.initNECaptcha)||void 0===e||e.call(window,{captchaId:window.C_CAPTCHA_KEY,element:"#netease-captcha",protocol:"https",width:"auto",onVerify:(e,t)=>{b=t.validate}})}:()=>{}}())},a.onclick=()=>B(1),h&&(h.onclick=()=>B(1)),w.onclick=()=>B(1),o.addEventListener("submit",(function(e){e.preventDefault(),p.style.display="none",_.style.display="none";const t=function(){let e="";const t=document.getElementsByName("report_reason");for(let n=0;n<t.length;n++){const o=t[n];o.checked&&(e=o.value)}return e}(),n=T();if(!n)return void(_.style.display="block");const o={reason:t,challenge:n},c=window.location.origin+window.location.pathname+"/_api/report";r.classList.add("loading"),fetch(c,{method:"POST",body:JSON.stringify(o),headers:{"Content-Type":"application/json; charset=utf-8"}}).then((e=>{r.classList.remove("loading"),e.ok?B(3):p.style.display="block"}))}));const A=new Map,L=e=>{const t=A.get(e);null!=t&&document.removeEventListener("keydown",t);const n=e.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'),o=e,c=n[n.length-1],d=function(e){("Tab"===e.key||9===e.keyCode)&&(e.shiftKey?document.activeElement===o&&(c.focus(),e.preventDefault()):document.activeElement===c&&(o.focus(),e.preventDefault()))};A.set(e,d),document.addEventListener("keydown",d),o.focus()};e.keepFocus=L,Object.defineProperty(e,"__esModule",{value:!0})}({}); })();
              window.dispatchEvent(new Event('resize'));
            });
          });
    </script>
</body>

</html>
