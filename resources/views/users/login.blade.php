<x-layout>
    <div class="container">
        <br>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Login</h5>
                <p class="card-text text-center">Please login into your account</p>
                    <form action="/login" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" required>
                        @error('email')
                            <div class="mt-8">
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" id="password" required>
                        @error('password')
                            <div class="mt-8">
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-muted text-center">
                Don't have an account? <a href="/register">register now</a>
            </div>
        </div>
    </div>
</x-layout>