namespace Spatie\Activitylog\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'log_name',
        'description',
        'subject',
        'causer',
        'properties',
    ];
}
