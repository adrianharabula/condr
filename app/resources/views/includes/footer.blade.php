<nav id="tf-footer" class="bg-black white">
    <div class="container">
        <div class="pull-left">
            <p>&copy; {{ date('Y') }} ConDr using <a href="http://themeforces.com/preview/?theme=free-awesomess-portfolio">Awesomess</a> by <a href="https://dribbble.com/jennpereira">Jenn</a> </p>
            @if (Storage::exists('version'))
            <p style="font-size:60%">Version {{ Storage::get('version') }}, last modified {{ \Carbon\Carbon::createFromTimestamp((int)trim(Storage::get('version.lastedit.time')))->diffForHumans() }}</p>
            @endif
        </div>
        <div class="pull-right">
            <ul class="social-media list-inline">
                <li class="hidden-xs"><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="https://github.com/adrianharabula/condr"><span class="fa fa-github"></span></a></li>
            </ul>
        </div>
    </div>
</nav>
