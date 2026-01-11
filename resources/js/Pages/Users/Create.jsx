import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm, Link } from '@inertiajs/react';

export default function Create({ auth }) {
    // Definimos los campos del formulario y sus valores iniciales
    const { data, setData, post, processing, errors } = useForm({
        name: '',
        email: '',
        password: '',
        phone: '',
        role: 'user', // Valor por defecto
    });

    const submit = (e) => {
        e.preventDefault();
        // Enviamos los datos a la ruta 'store' del controlador
        post(route('users.store'));
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Registrar Nuevo Usuario</h2>}
        >
            <Head title="Crear Usuario" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-lg mx-auto">
                        <form onSubmit={submit}>
                            {/* Nombre */}
                            <div className="mb-4">
                                <label className="block text-sm font-medium text-gray-700">Nombre Completo</label>
                                <input 
                                    type="text" 
                                    className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    value={data.name}
                                    onChange={e => setData('name', e.target.value)}
                                />
                                {errors.name && <div className="text-red-500 text-xs mt-1">{errors.name}</div>}
                            </div>

                            {/* Email */}
                            <div className="mb-4">
                                <label className="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                                <input 
                                    type="email" 
                                    className="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    value={data.email}
                                    onChange={e => setData('email', e.target.value)}
                                />
                                {errors.email && <div className="text-red-500 text-xs mt-1">{errors.email}</div>}
                            </div>

                            {/* Contraseña */}
                            <div className="mb-4">
                                <label className="block text-sm font-medium text-gray-700">Contraseña Provisional</label>
                                <input 
                                    type="password" 
                                    className="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    value={data.password}
                                    onChange={e => setData('password', e.target.value)}
                                />
                                {errors.password && <div className="text-red-500 text-xs mt-1">{errors.password}</div>}
                            </div>

                            {/* Teléfono */}
                            <div className="mb-4">
                                <label className="block text-sm font-medium text-gray-700">Teléfono (Opcional)</label>
                                <input 
                                    type="text" 
                                    className="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    value={data.phone}
                                    onChange={e => setData('phone', e.target.value)}
                                />
                            </div>

                            {/* Rol */}
                            <div className="mb-4">
                                <label className="block text-sm font-medium text-gray-700">Rol</label>
                                <select 
                                    className="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    value={data.role}
                                    onChange={e => setData('role', e.target.value)}
                                >
                                    <option value="user">Usuario Estándar</option>
                                    <option value="admin">Administrador</option>
                                </select>
                            </div>

                            <div className="flex items-center justify-end mt-6">
                                <Link href={route('users.index')} className="text-sm text-gray-600 underline mr-4">
                                    Cancelar
                                </Link>
                                <button 
                                    type="submit" 
                                    disabled={processing}
                                    className="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 disabled:opacity-50"
                                >
                                    {processing ? 'Guardando...' : 'Crear Usuario'}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}