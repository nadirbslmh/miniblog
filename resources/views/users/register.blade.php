<x-layout>
    <div class="container">
        <br>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Register</h5>
                <p class="card-text text-center">Please create an account to explore MiniBlog</p>
                    <form action="/register" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" required>
                        @error('name')
                            <div class="mt-8">
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

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

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation" required>
                        @error('password_confirmation')
                            <div class="mt-8">
                                <p class="text-danger">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-muted text-center">
                Already have an account? <a href="/login">login</a>
            </div>
        </div>
    </div>
</x-layout>