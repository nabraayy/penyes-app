import React from 'react';
import { Inertia } from '@inertiajs/inertia';

const ProfileEdit = ({ user }) => {
    const handleLogout = () => {
        Inertia.post('/logout');
    };

    return (
        <div className="profile-container">
            <img
                src={user.profile_image || 'https://via.placeholder.com/150'}
                alt="Foto de perfil"
                className="profile-img"
            />
            <h2 className="profile-name">{user.name}</h2>
            <p className="profile-info">Correo: {user.email}</p>
            <p className="profile-info">
                Miembro desde: {new Date(user.created_at).toLocaleDateString()}
            </p>
            <button className="edit-btn" onClick={() => alert('Edit Profile')}>
                Editar Perfil
            </button>
            <button className="logout-btn" onClick={handleLogout}>
                Cerrar Sesión
            </button>
        </div>
    );
};

export default ProfileEdit;
