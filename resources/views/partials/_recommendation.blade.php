@php



File::put('c:/Users/SONY/Desktop/my_model/input.txt', auth()->user()->id);
$output_data=exec('python c:/Users/SONY/Desktop/my_model/model.py');
// var_dump(json_decode($output_data));

if (strlen($output_data)==0)
  $output_data = json_encode([318,858,527,912,2019,2959,296,593,260,1252,913,1213,4226,903,608,1262,923,1267,745,1250]);

// $output_data = File::get('c:/Users/SONY/Desktop/my_model/input.txt');

$id = auth()->user()->id;
@endphp

<form method="POST" action="/users/{{$id}}/recommended" style="display:none">
    @csrf
    @method('PUT')
      <input type="text"  name="recommended" value="{{$output_data}}"  />
      <button type="submit" id="element"></button>
</form>

<script>
const element = document.getElementById('element');
element.click();
    </script>