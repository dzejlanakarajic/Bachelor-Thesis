<footer class="footer">
    <div class="container">
        <nav>
            <ul class="footer-menu">
                <li>
                    <a href="{{route('welcome')}}" target="_blank">
                        Home
                    </a>
                </li>
                @role('administrator')
                <li>
                    <a href="{{route('feedbacks')}}">
                        Feedbacks
                    </a>
                </li>
                @endrole
                <li>
                    <a href="{{route('topics')}}">
                        Search Topic
                    </a>
                </li>
            </ul>
            <p class="copyright text-center">
                ©
                <script>
                    document.write(new Date().getFullYear())
                </script>
                <a href="#">IBU SDP Monitoring System</a>.
            </p>
        </nav>
    </div>
</footer>