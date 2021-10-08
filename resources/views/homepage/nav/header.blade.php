<section id="hero" class="hero hero-home bg-gray">
    <div class="container">
      <div class="row d-flex">
        <div class="col-lg-6 text order-2 order-lg-1">
          <h1>IBU &mdash; Senior Design Project Monitoring System</h1>
          <p class="hero-text">The system was built using Laravel 5, which is a modern, open-source PHP web framework intended for fast and scalable development of web apps. You can use the following test accounts to explore the application functionalities and different access levels. {administrator, professor, student}@app.com : Default password is password.  </p>
          <div class="CTA">
          <a href="#testimonials" class="btn btn-primary btn-shadow btn-gradient link-scroll">Search Topics</a>
          <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary">Leave a Feedback</a></div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2"><img src="{{asset('homepage/img/Macbook.png')}}" alt="..." class="img-fluid"></div>
      </div>
    </div>
  </section>

  <div id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade">
      <div role="document" class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 id="exampleModalLabel" class="modal-title">Leave a Feedback</h5>
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <form id="signupform"method="post" action="{{route('sendFeedback')}}">
                {{csrf_field()}}
              <div class="form-group">
                <label for="fullname">Your Name</label>
                <input type="text" name="name" placeholder="Full Name" id="name">
              </div>
              
              <div class="form-group">
                  <label for="fullname">Your Message</label>
                  <textarea class="form-control" name="body" id="body" cols="10" rows="5"></textarea>
                </div>
              <div class="form-group">
                <button type="submit" class="submit btn btn-primary btn-shadow btn-gradient">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>