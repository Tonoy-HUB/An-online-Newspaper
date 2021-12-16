<style>
    .header-text{
        font-size: 20px;
    }
</style>
<div class="brand">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3">
                <div class="b-logo">
                    <a href="/">

                        <img src="{{asset('logo/navbar-logo.png')}}" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4"> 
                <div class="container">
                    <a href="" class="header-text">
                            <p id="date-today"> </p>
                    </a>
                </div>
                <script>
                    let dateDOM = document.getElementById("date-today");
                    let monthArray = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                    let dayarray = ["Saturday", "Sunday" , "Monday" , "Tuesday" , "Wednusday" , "Thrusday" , "Friday"];
                    let d = new Date();
                    let d1 = d.getDate();
                    let d2 = d.getMonth();
                    let d6 = d.getDay()+1;
                    let d4 = monthArray[d2];
                    let d5 = dayarray[d6];
                    let d3 = d.getFullYear();
                    let output = `Saturday , ${d1} / ${d4} / ${d3}`;
                    document.getElementById("date-today").innerHTML = output;
                </script>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="b-search">
                    {{Form::open(['route'=>'event_search', 'method'=>'POST'])}}
                    <input type="text" placeholder="Search" name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                    {{Form::close()}}
                </div>
            </div>
            <div class="social ml-auto">
                @if(Auth::check())
                    @if(Auth::user()->role_id == 1)
                        <a href="/admin/home"><i class="fas fa-home"></i></a>
                    @else
                        <a href="/reporter/home"><i class="fas fa-home"></i></a>
                    @endif
                @else
                    <a href="/login"><i class="fas fa-sign-in-alt">SIGN IN</i></a>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Brand End -->

<!-- Nav Bar Start -->
<div class="nav-bar">
    <div class="container">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    @php($categories = Category::latest()->take(7)->get())
                    @forelse($categories as $category)
                        <a href="/categorya/{{$category->id}}" class="nav-item nav-link ">
                            {{$category->title}}
                        </a>
                    @empty 
                    <a href="#" class="nav-item nav-link ">
                        Coming Soon
                    </a>
                    @endforelse


                    <a href="/contactus" class="nav-item nav-link">Contact Us</a>
                </div>
                <div class="social ml-auto"> 
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </nav>
    </div>
</div>
</body>
<!-- Nav Bar End -->