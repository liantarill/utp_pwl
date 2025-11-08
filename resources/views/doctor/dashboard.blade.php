<h1>DASHBOARD DOCTOR</h1>

<form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-danger">
        Logout
    </button>
</form>
