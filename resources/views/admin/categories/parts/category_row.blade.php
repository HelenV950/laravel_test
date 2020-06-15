          <tr>
             <th scope="row">{{$category->id}}</th>
             <td>{{$category->title}}</td>
             <td>{{$category->shotDescription}}</td>
             <td>{{$category->products_count}}</td>
             <td>
               <div style="display: flex; flex-direction: row; align-item: center; justify-conrent: center">
                <a href="{{route('admin.categories.edit', $category)}}"
                style="margin-right: 6px;"
                class="btn btn-warning">Edit</a>
                <form action="{{route('admin.categories.destroy', $category)}}" method="post">
                  @csrf
                   @method('DELETE')
                   <button class="btn btn-danger">Remove</button>
                </form>
               </div>
            </td>

           </tr>
           
       
  
                