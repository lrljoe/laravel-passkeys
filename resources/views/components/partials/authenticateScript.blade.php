<script>
    async function authenticateWithPasskey() {
        const authenticationOptions = await fetch('{{ route('passkeys.authentication_options') }}').then((response) => response.json());

        const startAuthenticationResponse = await startAuthentication({ optionsJSON: authenticationOptions,  });

        const form = document.getElementById('passkey-login-form');

        form.addEventListener('formdata', ({formData}) => {
            formData.set('start_authentication_response', JSON.stringify(startAuthenticationResponse));
        });

        form.submit();
    }
</script>
