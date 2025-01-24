// Get modal elements
const loginModal = document.getElementById('login-modal');
const signupModal = document.getElementById('signup-modal');

// Get buttons that open modals
const loginBtn = document.getElementById('login-btn');
const signupBtn = document.getElementById('signup-btn');

// Get close buttons
const closeLogin = document.getElementById('close-login');
const closeSignup = document.getElementById('close-signup');

// Open login modal
loginBtn.addEventListener('click', (e) => {
    e.preventDefault();
    loginModal.classList.remove('hidden');
});

// Open signup modal
signupBtn.addEventListener('click', (e) => {
    e.preventDefault();
    signupModal.classList.remove('hidden');
});

// Close login modal
closeLogin.addEventListener('click', () => {
    loginModal.classList.add('hidden');
});

// Close signup modal
closeSignup.addEventListener('click', () => {
    signupModal.classList.add('hidden');
});

// Close modals when clicking outside the modal content
window.addEventListener('click', (e) => {
    if (e.target === loginModal) {
        loginModal.classList.add('hidden');
    }
    if (e.target === signupModal) {
        signupModal.classList.add('hidden');
    }
});
