<div class="col-md-2">
    <div class="panel panel-default">
        <div class="panel-heading">Links</div>


        <div class="list-group">
            <ul>
                <li class="list-group-item"><a href='{{{url('/faculty')}}}'>Faculty Index</a></li>
                <li class="list-group-item"><a href='{{{url('/faculty/all')}}}'>Department Profile</a></li>
                 @if(Auth::check() && Auth::user()->role == 'hod')
                    <li class="list-group-item"><a href='{{{url('/faculty/add')}}}'>Add Faculty</a></li>
                    <li class="list-group-item"><a href='{{{url('/faculty/delete')}}}'>Delete Faculty</a></li>
                    <li class="list-group-item"><a href='{{{url('/faculty/profile')}}}'>View Your Profile</a></li>
                    <li class="list-group-item"><a href='{{{url('/faculty/edit')}}}'>Edit Your Profile</a></li>
                 @elseif(Auth::check() && Auth::user()->role =='faculty')
                    <li class="list-group-item"><a href='{{{url('/faculty/profile')}}}'>View Your Profile</a></li>
                    <li class="list-group-item"><a href='{{{url('/faculty/edit')}}}'>Edit Your Profile</a></li>
                 @endif
            </ul>
        </div>
    </div>
</div>