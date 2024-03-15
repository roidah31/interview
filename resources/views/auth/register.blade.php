 @extends('layouts.logintheme')

@section('content')
 <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
				
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Daftar Baru!</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
								@csrf
                                <div class="form-group row">
									 <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="namalengkap" name="namalengkap"
                                            placeholder="nama lengkap anda" required>
											 <input type="hidden" id="role" name="role" value="member">
											@error('namalengkap')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                                    </div>
									 <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="notelp" name="notelp"
                                            placeholder="no telpon yng dapat di hubungi">
											@error('notelp')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                                    </div>
									
									 <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nosim" name="nosim"
                                            placeholder="no sim anda yang aktif">
											@error('nosim')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                                    </div>
									
                                </div>
								 <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="name" name="name"
                                            placeholder="username">
											 @error('username')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
                                    </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Email Address">
										 @error('email')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password" placeholder="Password">
											@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password" placeholder="Repeat Password">
											@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
                                    </div>
                                </div>
                              
							   <div class="col-sm-6 mb-3 mb-sm-0">
                                        <textarea class="form-control form-control-user" id="alamat" name="alamat"
                                            placeholder="alamat anda"></textarea>
											@error('alamat')
											<span class="invalid-feedback" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
                                    </div>
									 <button class="btn btn-primary" value="submit">Daftar</button>
                            </form>
                            <hr>
                            <div class="text-center">
                               
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{url('/login')}}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
	@endsection