// Importar Firebase
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import { getFirestore, addDoc, collection } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-firestore.js";

// 🔴 CAMBIA ESTO CON TU CONFIG
const firebaseConfig = {
  apiKey: "AIzaSyD4z4m7cQEP-DgZj_RKjwegPTyvf-vFhI8",
  authDomain: "megasrf-72aac.firebaseapp.com",
  projectId:"megasrf-72aac",
  storageBucket: "megasrf-72aac.firebasestorage.app",
  messagingSenderId: "289651269227",
  appId: "1:289651269227:web:3aa260156bd5040d14db2e"
};

// Inicializar Firebase
const app = initializeApp(firebaseConfig);
const db = getFirestore(app);

// Función para guardar log
export async function logAccess(data) {
    try {
        await addDoc(collection(db, "logs"), data);
        console.log("Acceso registrado ✅");
    } catch (error) {
        console.error("Error:", error);
    }
}
