@extends('Admin.index')
   @section('admin.content')
   <main id="main" class="main">


    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Subscriber</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
              
                    <th scope="col">Email</th>
              
                    <th scope="col">Date</th>              
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(!empty($subscribers))
                    @foreach($subscribers as $value)
                      <tr>
                          <td>{{$value->id}}</td>
                          <td>{{$value->email}}</td>
                          <td>{{ $value->created_at->format('Y-m-d H:i:s') }}</td>
                          <td>
                            <form action="{{ url('/admin/subscriber', ['id' => $value->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                         
                      </tr>
                     @endforeach
                  @endif
                

               
                </tbody>

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
    </section>

