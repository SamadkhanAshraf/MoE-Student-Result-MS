<div class="modal fade modal-animate" id="show-user-profile" tabindex="-1" aria-labelledby="animateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('users.update-user-profile',\Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title text-dark">{{ __('keyword.user-profile') }}</h5>
                    <a href="#" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body p-0">
                    <div class="user-profile user-card m-0">
                        <div class="card-header border-0 p-0 pb-0">
                            <div class="cover-img-block">
                                <img src="{{ asset(auth()->user()->cover_image??'uploads/covers/default-cover.jpg') }}" alt="" class=" w-100 preview-cover" style="height:200px; object-fit: cover">
                                <div class="overlay"></div>
                                <div class="change-cover">
                                    <div class="dropdown">
                                        <a class="drp-icon dropdown-toggle" href="#" onclick="document.getElementById('cover-image').click();"><i class="icon feather icon-camera"></i></a>
                                    </div>
                                    <input type="file" name="coverImage" id="cover-image" class="d-none " accept="image/*" onchange="previewImage(this,'preview-cover');" />
                                </div>
                            </div>
                        </div>
                        <div class="user-about-block m-0 px-5">
                            <div class="row">
                                <div class="col-md-4 text-center mt-n5">
                                    <div class="change-profile text-center">
                                        <div class="dropdown w-auto d-inline-block">
                                            <a class="dropdown-toggle show" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <div class="profile-dp">
                                                    <div class="position-relative d-inline-block">
                                                        <img class="img-radius img-fluid wid-100 preview-profile" src="{{ asset(auth()->user()->profile_image??'uploads/avatars/avatar.png') }}" alt="User image">
                                                    </div>
                                                    <div class="overlay">
                                                        <a href="#" onclick="document.getElementById('profile-image').click();">
                                                            <span>change</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="certificated-badge">
                                                    <a href="#" onclick="document.getElementById('profile-image').click();">
                                                        <i class="icon feather icon-camera text-dark bg-icon"></i>
                                                    </a>
                                                    <input type="file" name="profileImage" id="profile-image" class="d-none" accept="image/*" onchange="previewImage(this,'preview-profile');"/>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <h5 class="mb-1">
                                        <input type="text" name="name" class="form-control border-0 bg-transparent text-center f-22 f-w-500 py-0" value="{{ \Auth::user()->name??'N/A' }}">
                                    </h5>
                                    <p class="mb-0 f-w-500 text-muted">
                                        @forelse (\Auth::user()->roles as $key=> $role)
                                            {{ $role->name }} {{ $key>0?', ':'' }}
                                        @empty
                                        @endforelse
                                    </p>
                                    <p class="mb-2 f-12 text-muted">
                                        <input type="text" name="position" class="form-control border-0 bg-transparent text-center" value="{{ \Auth::user()->position??'N/A' }}">
                                    </p>
                                </div>
                                <div class="col-md-8 mt-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="media">
                                                <i class="feather icon-mail me-1 mt-2 f-18"></i>
                                                <div class="media-body text-start">
                                                    <p class="mb-0 text-muted">
                                                        <input type="text" name="email" class="form-control border-0 bg-transparent" value="{{ \Auth::user()->email??'N/A' }}">
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <i class="feather icon-phone me-1 mt-2 f-18"></i>
                                                <div class="media-body text-start">
                                                    <p class="mb-0 text-muted">
                                                        <input type="text" name="phone" class="form-control border-0 bg-transparent" value="{{ \Auth::user()->phone??'N/A' }}">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="media">
                                                <i class="feather icon-map-pin me-1 mt-2 f-18"></i>
                                                <div class="media-body text-start">
                                                    <p class="mb-0 text-muted">
                                                        <input type="text" name="address" class="form-control border-0 bg-transparent" value="{{ \Auth::user()->address??'N/A' }}">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary px-4">  <i class="feather me-2 icon-save"></i>{{ __('keyword.save-changes') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade modal-animate " id="change-password"
    tabindex="-1" aria-labelledby="animateModalLabel"
    aria-hidden="true" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('users.update-user-profile',\Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title text-dark">{{ __('keyword.change-password') }}</h5>
                    <a href="#" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <input type="hidden" name="shavePasswordChanges" value="yes">
                <div class="modal-body px-5 py-4">
                    <div class="mb-3">
                        <label class="font-weight-bolder">{{__('keyword.old-password') }}</label>
                        <input type="password" class="form-control {{ $errors->has('old_password')?'is-invalid':'' }}" name="old_password"  placeholder="{{__('keyword.old-password') }}" >
                    </div>

                    <div class="mb-3">
                        <label class="font-weight-bolder">{{__('keyword.new-password') }}</label>
                        <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }} " name="password" placeholder="{{__('keyword.new-password') }}" >
                    </div>
                    <div class="mb-1">
                        <label class="font-weight-bolder">{{__('keyword.confirm-new-password') }}</label>
                        <input type="password" class="form-control {{ $errors->has('password_confirmation')?'is-invalid':'' }}" name="password_confirmation" placeholder="{{__('keyword.confirm-new-password') }}" >
                    </div>
                </div>
                <div class="modal-footer px-5">
                    <button type="submit" class="btn btn-outline-primary ">  <i class="feather me-2 icon-save"></i>{{ __('keyword.save-changes') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

