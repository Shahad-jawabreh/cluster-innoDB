   <?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB ;

Route::post('/users', [UserController::class, 'addUser']);

