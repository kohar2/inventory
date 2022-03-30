@extends('base')

@section('title', 'Seznam článků')
@section('description', 'Výpis všech článků v administraci.')

@section('content')
    <table class="table table-striped table-bordered table-responsive-md">
        <thead>
        <tr>
            <th>Titulek</th>
            <th>Popisek</th>
            <th>Datum vytvoření</th>
            <th>Datum poslední změny</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($departments as $department)
            <tr>
                <td>
                    <a href="{{ route('department.show', ['department' => $department]) }}">
                        {{ $department->id }}
                    </a>
                </td>
                <td>{{ $department->name }}</td>
                <td>{{ $department->created_at }}</td>
                <td>{{ $department->updated_at }}</td>
                <td>
                    <a href="{{ route('department.edit', ['department' => $department]) }}">Editovat</a>
                    <a href="#" onclick="event.preventDefault(); $('#department-delete-{{ $department->id }}').submit();">Odstranit</a>

                    <form action="{{ route('department.destroy', ['department' => $department]) }}" method="POST" id="department-delete-{{ $department->id }}" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    Nikdo zatím nevytvořil žádný článek.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <a href="{{ route('department.create') }}" class="btn btn-primary">
        Vytvořit nový článek
    </a>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-computer-modal">
        Pridať
    </button>

    <div class="modal fade" id="add-computer-modal" tabindex="-1" aria-labelledby="add-computer-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-computer-label">Pridať nový počítač</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" class="form w-100" method="post">

                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Názov</span>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Popis</span>
                            <input type="text" class="form-control" name="description">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Štítok</span>
                            <input type="text" class="form-control" name="label">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Typ PC</span>
                            <input type="text" class="form-control" name="type-pc">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Sériové číslo</span>
                            <input type="text" class="form-control" name="serial-number">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">CPU</span>
                            <input type="text" class="form-control" name="cpu">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">RAM</span>
                            <input type="text" class="form-control" name="ram">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">HD1</span>
                            <input type="text" class="form-control" name="hd1">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">HIM</span>
                            <input type="text" class="form-control" name="him">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Príslušenstvo</span>
                            <input type="text" class="form-control" name="accessories">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Dátum inštalácie</span>
                            <input type="text" class="form-control" name="install-date">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Dátum nákupu</span>
                            <input type="text" class="form-control" name="buy-date">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Záruka do</span>
                            <input type="text" class="form-control" name="waranty">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">IP1</span>
                            <input type="text" class="form-control" name="ip1">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Typ IP1</span>
                            <input type="text" class="form-control" name="type-ip1">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">MAC1</span>
                            <input type="text" class="form-control" name="mac1">
                        </div>

                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">IP2</span>
                            <input type="text" class="form-control" name="ip2">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Typ IP2</span>
                            <input type="text" class="form-control" name="type-ip2">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">MAC2</span>
                            <input type="text" class="form-control" name="mac2">
                        </div>

                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">IP3</span>
                            <input type="text" class="form-control" name="ip3">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Typ IP3</span>
                            <input type="text" class="form-control" name="type-ip3">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">MAC3</span>
                            <input type="text" class="form-control" name="mac3">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">OS</span>
                            <input type="text" class="form-control" name="os">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Licencia OS</span>
                            <input type="text" class="form-control" name="os-licence">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Office</span>
                            <input type="text" class="form-control" name="office">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Licencia Office</span>
                            <input type="text" class="form-control" name="office-licence">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Iný SW</span>
                            <input type="text" class="form-control" name="other-sw">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Licencia Iný SW</span>
                            <input type="text" class="form-control" name="other-sw-licence">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Poznámka</span>
                            <input type="text" class="form-control" name="note">
                        </div>
                        <div class="input-group flex-nowrap mb-2">
                            <span class="input-group-text" id="addon-wrapping">Profylaktika</span>
                            <input type="text" class="form-control" name="prophylaxis">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zatvoriť</button>
                            <button type="submit" name="add-computer" class="btn btn-primary">Pridať</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
