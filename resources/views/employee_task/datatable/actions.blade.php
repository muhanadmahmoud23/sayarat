<div class="actions">


    <form action="{{ route('updateStatus', $id) }}" method="POST">
        <a href="{{ route('employee_task.edit', $id) }}" class="btn btn-info text-white ml-3">Edit</a>

        @csrf
        @method('post')

        <button type="submit" class="btn btn-primary" onclick="return confirm('Sure Want Change status to completted??')">Update Status</button>
    </form>

</div>
