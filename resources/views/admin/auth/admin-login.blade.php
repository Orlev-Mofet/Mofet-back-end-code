@extends('admin.auth.master')

@section('content')


<div class="ls qs ym alj">
   <div class="ls qw uh">
      <div class="ls uh ym yz ard auf cex cxn dcy dly">
         <div class="gs ti ue cwq">
            <div>
               <img class="buz logo-size" src="{{asset('assets/image/logo.png')}}" alt="Your Company">
               <h2 class="lh avm avy awn aws axq cho">{{ __('Sign in to your account') }}</h2>
            </div>
            <div class="kr">
               <div>
                  <form action="{{ route('admin.login.submit') }}" method="POST" class="abt">

                    @csrf


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
                            <input id="password" name="password" type="password" autocomplete="current-password" required="" class="lp ti adp aev arl bbi bbo bbs bca bfy bmz bna bnm chy cia">
                        </div>
                        @error('password')
                            <span class="ayx" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                     </div>
                     <div>
                        @error('state')
                            <span class="ayx" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                     </div>
                     <div class="ls yu za">
                        <div class="ls yu"><input id="remember-me" name="remember-me" type="checkbox" class="nr rs adk afq ayc bnm"><label for="remember-me" class="jr lp avv awk axo">{{ __('Remember me') }}</label></div>
                        <div class="avv awk"><a href="{{ route('admin.password.request') }}" class="awb ayc bla">Forgot password?</a></div>
                     </div>
                     <div><button type="submit" class="ls ti yz adp ajm ara arl avv awb awk bac bbi bin bot bou bow bpf">{{ __('Sign in') }}</button></div>
                  </form>
               </div>


               <p class="kw avv awk axm">{{ __('Not a member?') }} <a href="{{ route('admin.signup') }}" class="awb ayc bla">{{ __('Sign up') }}</a></p>

               <!-- <div class="kr">
                  <div class="ab">
                     <div class="aa af ls yu" aria-hidden="true">
                        <div class="ti afh afp"></div>
                     </div>
                     <div class="ab ls yz avv avz awk"><span class="alj arf axq">Or continue with</span></div>
                  </div>
                  <div class="lf lw yd zk">
                     <a href="#" class="ls ti yu yz zj adp ahi ara arl bac bot bou bow boy">
                        <svg class="nu rw" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                           <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>
                        <span class="avv awb awk">Twitter</span>
                     </a>
                     <a href="#" class="ls ti yu yz zj adp ahj ara arl bac bot bou bow boz">
                        <svg class="nu rw" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                           <path fill-rule="evenodd" d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="avv awb awk">GitHub</span>
                     </a>
                  </div>
               </div> -->
            </div>
         </div>
      </div>
      <div class="ab ly qx uh cur"><img class="aa af pc ti apz" src="https://images.unsplash.com/photo-1496917756835-20cb06e75b4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1908&amp;q=80" alt=""></div>
   </div>
</div>

@endsection
