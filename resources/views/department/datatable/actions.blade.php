<div class="actions">


    <form action="{{ route('department.destroy', $id) }}" method="POST">
        <a href="{{ route('department.edit', $id) }}" class="btn btn-info text-white ml-3">Edit</a>

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</button>
    </form>

</div>
