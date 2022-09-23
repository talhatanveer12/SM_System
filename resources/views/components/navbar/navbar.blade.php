<div class="row">
    <div class="col-md-6 col-sm-8 clearfix">
        <ul class="user-info pull-left pull-none-xsm">
            <li class="profile-info dropdown">
                <!-- add class "pull-right" if you want to place this from right -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="flex">
                        <img src={{ session('photo') ? '/storage/' . session('photo') : '/assets/images/thumb-1@2x.png' }}
                            alt="" class="img-circle imgPhoto" width="50" height="50" />
                        <span class="pt-5">{{ auth()->user()->name }}</span>
                    </div>
                </a>
                <ul class="dropdown-menu">
                    <li class="caret"></li>
                    @can('admin')
                        <li>
                            <a href="/institute-profile">
                                <i class="entypo-user"></i>
                                Edit Profile
                            </a>
                        </li>
                    @endcan
                    <li>
                        <a href="/account-settings">
                            <i class="fa-solid fa-key"></i>
                            Change Password
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="col-md-6 col-sm-4 clearfix hidden-xs">
        <ul class="list-inline links-list pull-right">
            <li class="sep"></li>
            <li class="sep"></li>

            <li>
                <form id="form_id" method="POST" action="/logout" class="display: none">
                    @csrf
                    <button class="btn btn-link">
                        Log Out <i class="entypo-logout right"></i>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
