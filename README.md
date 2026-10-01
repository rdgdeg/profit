# Pro-Fit.be

Site vitrine en PHP, sans base de données.

## En local

```bash
php -S 127.0.0.1:8098 router.php
```

Puis ouvrir http://127.0.0.1:8098/fr

## Déployer sur Vercel

Le dépôt est prêt pour [Vercel](https://vercel.com). PHP n’est pas un runtime natif : `vercel.json` utilise `vercel-php`, et les images, polices et CSS restent des fichiers statiques.

1. Sur Vercel, choisir **Add New… → Project**.
2. Importer le dépôt GitHub `rdgdeg/profit`.
3. Laisser le répertoire racine, sans commande de build.
4. Déployer.

La page d’accueil redirige vers `/fr`.

Le formulaire de contact valide les champs et tente un envoi par `mail()`. Sur Vercel, cet envoi ne part que si l’hébergement sait envoyer du courrier. Les messages ne sont pas stockés dans une base.
