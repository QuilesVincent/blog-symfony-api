window.onload = function () {
        let connexionButton = document.querySelector('.connexion_cache');
        let formConnexion = document.querySelector('.form_co');
        let formPreCo = document.querySelector('.pre_co');

        connexionButton.addEventListener('click', () => {
            formPreCo.classList.add('hide');
            formConnexion.classList.remove('hide');
        });
};
