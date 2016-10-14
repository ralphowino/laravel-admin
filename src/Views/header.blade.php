<div class="row" style="z-index:9999999;">
    <div class="col-sm-2 col-sm-offset-5">
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                Switch Theme
                <span class="caret"></span>
            </button>
            <ul style="z-index:9999999 !important;" class="dropdown-menu" aria-labelledby="dropdownMenu1">
                @foreach($available_themes as $theme)
                    <li><a href="{{url("home?switchTheme={$theme->getName()}")}}">{{ucwords($theme->getName())}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>