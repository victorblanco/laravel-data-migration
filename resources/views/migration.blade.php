{!! '<?' . 'php' !!}

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class {{ucfirst(camel_case($table))}}DataMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::table('{{$table}}')->insert([
            @foreach($data as $row)
                [
    @foreach($row->toArray() as $key => $value)
        @if ($value !== null)
            '{{$key}}' => '{!! ($value) !!}',
        @else
            '{{$key}}' => null,
        @endif
    @endforeach
                 ],
            @endforeach
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('{{$table}}')->truncate();
    }
}
