<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
        <title>The BoolBLOG</title>
    </head>
    <body>
        <header>
               <nav>
                   <ul>
                       <li>
                           <a href="{{route('posts.index')}}">Home</a> 
                       </li>
                       <li>
                            <a href="#">(World)</a> 
                       </li>
                       <li>
                           <a href="#">(Technology)</a> 
                       </li>
                       <li>
                           <a href="#">(Design)</a> 
                       </li>
                       <li>
                           <a href="#">(Culture)</a> 
                       </li>
                       <li>
                            <a href="#">(Business)</a> 
                        </li>
                        <li>
                            <a href="#">(Politics)</a> 
                        </li>
                        <li>
                            <a href="#">(Opinion)</a> 
                        </li>
                        <li>
                            <a href="#">(Science)</a> 
                        </li>
                        <li>
                            <a href="#">(Health)</a> 
                        </li>
                        <li>
                            <a href="#">(Style)</a> 
                        </li>
                        <li>
                            <a href="#">(Travel)</a> 
                        </li>
                   </ul>
               </nav>
        </header>
        <main>
            <aside>
                <div class="about">
                    <h3>ABOUT</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non expedita perspiciatis fugiat, illum mollitia laborum, beatae facere quas nihil placeat ipsa perferendis, impedit maiores cum inventore repellendus delectus animi odit!
                    </p>
                </div>
                <div class="archives">
                    <h3>ARCHIVES</h3>
                    <ul class="archives__list">
                        <li><a href="#" class="_btn">March 2021</a></li>
                        <li><a href="#" class="_btn">February 2021</a></li>
                        <li><a href="#" class="_btn">January 2021</a></li>
                        <li><a href="#" class="_btn">December 2021</a></li>
                        <li><a href="#" class="_btn">November 2021</a></li>
                        <li><a href="#" class="_btn">October 2021</a></li>
                        <li><a href="#" class="_btn">September 2021</a></li>
                        <li><a href="#" class="_btn">August 2021</a></li>
                        <li><a href="#" class="_btn">July 2021</a></li>
                        <li><a href="#" class="_btn">June 2021</a></li>
                        <li><a href="#" class="_btn">Nay 2021</a></li>
                        <li><a href="#" class="_btn">April 2021</a></li>
                    </ul>
                </div>
                <div class="elsewhere">
                    <h3>ELSEWHERE</h3>
                    <ul class="elsewhere__list">
                        <li><a href="#" class="_btn">Github</a></li>
                        <li><a href="#" class="_btn">Instagram</a></li>
                    </ul>
                </div>
            </aside>
            @yield('pageContent')
        </main>

        <footer>
            <div class="logo__img">
                <img src="../images/logo.png" alt="logo">
            </div>
            <p>This is the BOOLblog by Elena Catani</p>
        </footer>
    </body>
</html>