@extends(layouts('site').'.index')

@section('content')
    <section class="profileDetails passwordpage">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg- col-md-6 ">
                    <form action="" class="modalForm quickSearch passwordForm">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="password" class="form-control" placeholder="Enter Your Name">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="30" placeholder="Enter Your Message"></textarea>
                        </div>
                        <button class="btn joinBtn save" type="submit">Send</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
