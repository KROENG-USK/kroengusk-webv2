<div class="col-md-4">
    <br />
    <!-- Categories Widget -->
    <div class="card cb2 my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ url('category', ['catid' => $category->id]) }}">{{ $category->CategoryName }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Side Widget -->
    <div class="card cb2 my-4">
        <h5 class="card-header">Recent News</h5>
        <div class="card-body">
            <ul class="mb-0">
                @forelse($recentNews as $news)
                    <li>
                        <a href="{{ url('news', ['nid' => $news->id, 'page' => $news->PostUrl]) }}">{{ $news->PostTitle }}</a>
                    </li>
                @empty
                    <li>No recent news available.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="calendar card shadow">
        <div class="calendar-header">
            <span class="month-picker" id="month-picker">January</span>
            <div class="year-picker">
                <span class="year-change" id="prev-year">
                    <pre><</pre>
                </span>
                <span id="year">2021</span>
                <span class="year-change" id="next-year">
                    <pre>></pre>
                </span>
            </div>
        </div>
        <div class="calendar-body">
            <div class="calendar-week-day">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <div class="calendar-days"></div>
        </div>
        <div class="month-list"></div>
    </div>
    <br><br>
    <script src="{{ asset('calendar/app.js') }}"></script>
</div>
