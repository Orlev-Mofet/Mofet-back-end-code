@extends('admin.auth.master')

@section('content')


<div class="ls qs ym alj">
   <div class="ls qw uh">
      <div class="ls uh ym yz ard auf cex cxn dcy dly kr">
         <div class="gs ti ue cwq">
            <div>
               <img class="logo-size buz" src="{{asset('assets/image/logo.png')}}" alt="Your Company">
               <h2 class="lh avm avy awn aws axq cho">{{ __('Create your Account') }}</h2>
            </div>
            <div class="kr">
               <div>
                  <form action="{{ route('admin.signup.submit') }}" method="POST" class="abt">

                    @csrf


                     <div>
                        <label for="name" class="lp avv avz awk axq">{{ __('Name') }}</label>
                        <div class="kw">
                            <input id="name" name="name" type="text" autocomplete="name" required="" value="{{ old('name') }}" class="lp ti adp aev arl bbi bbo bbs bca bfy bmz bna bnm chy cia">
                        </div>
                        @error('name')
                            <span class="ayx" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                     </div>

                     <div>
                        <label for="email" class="lp avv avz awk axq">{{ __('Email address') }}</label>
                        <div class="kw">
                            <input id="email" name="email" type="email" autocomplete="email" required="" value="{{ old('email') }}" class="lp ti adp aev arl bbi bbo bbs bca bfy bmz bna bnm chy cia">
                        </div>
                        @error('email')
                            <span class="ayx" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                     </div>

                    <div>
                        <label for="password" class="lp avv avz awk axq">{{ __('Password') }}</label>
                        <div class="kw">
                            <input id="password" name="password" type="password" value="{{ old('password') }}" required="" autocomplete="current-password" required="" class="lp ti adp aev arl bbi bbo bbs bca bfy bmz bna bnm chy cia">
                        </div>
                        @error('password')
                            <span class="ayx" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div>
                        <label for="password" class="lp avv avz awk axq">{{ __('Confirm') }}</label>
                        <div class="kw">
                            <input id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" required="" type="password" autocomplete="confirm-password" required="" class="lp ti adp aev arl bbi bbo bbs bca bfy bmz bna bnm chy cia">
                        </div>
                        @error('password_confirmation')
                            <span class="ayx" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                     <div class="ls yu za">
                        <div>
                            <div class="ls yu">
                                <input id="condition_accept" name="condition_accept" type="checkbox" {{ old('condition_accept') ? "checked": '' }} class="nr rs adk afq ayc bnm">
                                <label for="condition_accept" class="jr lp avv awk axo">I accept
                                    <a href="#" class="awb ayc bla">Terms and Conditions</a>
                                </label>
                            </div>
                            @error('condition_accept')
                                <span class="ayx" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                     </div>
                     <div>
                        <button type="submit" class="ls ti yz adp ajm ara arl avv awb awk bac bbi bin bot bou bow bpf">{{ __('Create an account') }}</button>
                    </div>
                  </form>
               </div>


               <p class="kw avv awk axm">{{ __('Already have an account?') }} <a href="{{ route('admin.login') }}" class="awb ayc bla">{{ __('Sign in') }}</a></p>

            </div>
         </div>
      </div>
      <div class="ab ly qx uh cur"><img class="aa af pc ti apz" src="https://images.unsplash.com/photo-1496917756835-20cb06e75b4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1908&amp;q=80" alt=""></div>
   </div>
</div>

@endsection
