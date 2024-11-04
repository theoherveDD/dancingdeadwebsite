 async function main() {
   try {
     const response = await fetch(
       "https://amethyst-plume-reading.glitch.me/dancingdeadplaylist"
     );
     const latestReleases = await response.json();
    console.log("Dernières sorties :", latestReleases);


    const releasesFilterShortByDiv = document.querySelector(".music-short-by");
    //////console.log(releasesFilterShortByDiv);



    const selectShortBy = document.createElement("select");
    selectShortBy.id = "short-by";
    selectShortBy.name = "short-by";
    selectShortBy.className = "short-by-select";


    const shortByOptions = ["Popularity", "A-Z", "Date"];

    const shortByTitle = document.createElement("option");
    shortByTitle.value = "";
    shortByTitle.textContent = "Sort By";
    selectShortBy.prepend(shortByTitle);




    shortByOptions.forEach((option) => {
      const selectOption = document.createElement("option");

      selectOption.value = option.toLowerCase();
      selectOption.textContent = option;

      selectShortBy.appendChild(selectOption);
    });



    selectShortBy.addEventListener("change", (event) => {
      const value = event.target.value;

      if (value === "popularity") {
        latestReleases.sort((a, b) => b.popularity - a.popularity);
      } else if (value === "a-z") {
        latestReleases.sort((a, b) => a.name.localeCompare(b.name));
      } else if (value === "date") {
        latestReleases.sort((a, b) => new Date(b.release_date) - new Date(a.release_date));
      }

    const releasesAll = document.getElementById("releases_all");


    while (releasesAll.firstChild) {
      releasesAll.removeChild(releasesAll.firstChild);
    }



    for (let i = 0; i < latestReleases.length; i++) {

      const div = document.createElement("div");
      div.className = "release r" + (i + 1);

      // si plusieurs singles on le même nom latestReleases[i].album, alors on ne les affcihe pas plusieurs fois mais seulement un fois avec le nom de l'album.


      const a = document.createElement("a");
      a.href = latestReleases[i].external_urls.spotify;
      a.target = "_blank";
      if (latestReleases[i].album_type === "single") {
        a.setAttribute(
          "aria-label",
          "Écouter " +
            latestReleases[i].name +
            " par " +
            latestReleases[i].artists +
            " sur Spotify"
        );
      }
      else {
        a.setAttribute(
          "aria-label",
          "Écouter " +
            latestReleases[i].album +
            " par " +
            latestReleases[i].artists +
            " sur Spotify"
        );
      }

      const img = document.createElement("img");
      img.src = latestReleases[i].cover_url;
      img.alt =
        "cover-release-" +
        latestReleases[i].name.replace(/\s+/g, "") +
        "-" +
        latestReleases[i].artists.replace(/\s+/g, "");
      img.loading = "lazy";


      const h3 = document.createElement("h3");
      h3.textContent = latestReleases[i].name;


      const p = document.createElement("p");
      p.textContent = latestReleases[i].artists;

      a.appendChild(img);
      a.appendChild(h3);
      a.appendChild(p);


      div.appendChild(a);


      releasesAll.appendChild(div);
    }
  });

  releasesFilterShortByDiv.appendChild(selectShortBy);




  const releasesAll = document.getElementById("releases_all");


  while (releasesAll.firstChild) {
    releasesAll.removeChild(releasesAll.firstChild);
  }



  for (let i = 0; i < latestReleases.length; i++) {

const div = document.createElement("div");
div.className = "release r" + (i + 1);


const a = document.createElement("a");
a.href = latestReleases[i].external_urls.spotify;
a.target = "_blank";
a.setAttribute(
  "aria-label",
  "Écouter " +
    latestReleases[i].name +
    " par " +
    latestReleases[i].artists +
    " sur Spotify"
);


const img = document.createElement("img");
img.src = latestReleases[i].cover_url;
img.alt =
  "cover-release-" +
  latestReleases[i].name.replace(/\s+/g, "") +
  "-" +
  latestReleases[i].artists.replace(/\s+/g, "");
img.loading = "lazy";


const h3 = document.createElement("h3");
h3.textContent = latestReleases[i].name;


const p = document.createElement("p");
p.textContent = latestReleases[i].artists;


a.appendChild(img);
a.appendChild(h3);
a.appendChild(p);


div.appendChild(a);


releasesAll.appendChild(div);
  }
    
  } catch (error) {
    console.error("Une erreur est survenue :", error);
  }
}

// async function main5() {
//   try {
//     const response = await fetch(
//       "https://amethyst-plume-reading.glitch.me/dancingdeadplaylist"
//     );
//     const latestReleases = await response.json();

//     const responseArtists = await fetch(
//       "https://amethyst-plume-reading.glitch.me/dancingdeadartists"
//     );
//     const ArtistImg = await responseArtists.json();

//     const newLatestReleases = latestReleases.slice(0, 16);
//     ////////console.log("16 dernières sorties :", newLatestReleases);


//       const artists = [];


//       for (let i = 0; i < newLatestReleases.length; i++) {
//         newLatestReleases[i].artists.split(", ").forEach((artist) => {

//           const a = artists.find((a) => a.name === artist);


//           if (!a) {

//             artists.push({
//               name: artist,
//               releases: 1,
//             });


//           } else {

//             a.releases++;
//           }
//         }

//         );

//       }

//       // ////////console.log("Artistes :", artists);
      
//       // const artistsImg = document.querySelectorAll(".artists_home img");
//       // ////////console.log(artistsImg);
//       // ////////console.log(ArtistImg);

//       // const artistsName = document.querySelectorAll(".artists_home p");
//       // const artistsLink = document.querySelectorAll(".artists_home a");
//       // artists.sort((a, b) => b.releases - a.releases);

//       // const popularArtists = artists.slice(0, 6);
//       // ////////console.log("Artistes les plus populaires :", popularArtists);

//     //   for (let i = 0; i < 6; i++) {
//     //       artistsImg[i].srcset = ArtistImg.find((img) => img.name === popularArtists[i].name).image_url;
//     //       artistsImg[i].alt = "dancing-dead-artist-" + popularArtists[i].name.replace(/\s+/g, "-");
//     //       artistsName[i].textContent = popularArtists[i].name;
//     //       artistsLink[i].href = "https://www.dancingdeadrecords.com/testwordpress/artist-details/?artist_id=" + ArtistImg.find((img) => img.name === popularArtists[i].name).id + "&artist_name=" + popularArtists[i].name;
//     //       artistsLink[i].setAttribute("aria-label", "Voir la page de l'artiste " + popularArtists[i].name);
//     //   }
//     // }

//       catch (error) {
//         console.error("Une erreur est survenue :", error);
//       }
// }

async function main4() {
  try {
    const response = await fetch(
      "https://amethyst-plume-reading.glitch.me/dancingdeadplaylist"
    );
    const latestReleases = await response.json();
    ////////console.log("Dernières sorties :", latestReleases);

    const responseArtists = await fetch(
      "https://amethyst-plume-reading.glitch.me/dancingdeadartists"
    );
    const ArtistImg = await responseArtists.json();
    ////////console.log(ArtistImg);

          // Boucle permettant d'afficher dans la page artiste détail ayant pour URL le nom de l'artiste qu'il faudra récupérer (exemple pour naeleck : https://www.dancingdeadrecords.com/testwordpress/artist/naeleck/) afin de récupérer les informations de l'artiste et d'affciher dans les 4 item (artists-releases-item) contenant une image (cover), un h3 (titre) et un p (artistes) qui correspondront aux 4 dernières sorties de l'artiste.

    const artistsReleases = document.querySelectorAll(".artists-releases-item");
    ////////console.log(artistsReleases);

    const url = new URL(window.location.href);
    ////////console.log(url);
    const pathSegments = url.pathname.split('/');
    ////////console.log(pathSegments);
    const lastSegment = pathSegments.pop() || pathSegments.pop(); // handle potential trailing slash
    ////////console.log(lastSegment); // Affiche 'resource'

    const artistName = lastSegment.replace(/-/g, " ");;
    //si il y a un tiret dans le nom de l'artiste, on le remplace par un espace
    ////////console.log(artistName);


    const artistReleases = latestReleases.filter((release) => {
      // Vérifie si release.artists est un tableau
      if (Array.isArray(release.artists)) {
          // Si c'est un tableau, on vérifie si un des artistes contient artistName
          return release.artists.some((artist) => artist.toLowerCase().includes(artistName.toLowerCase()));
      } else if (typeof release.artists === 'string') {
          // Si c'est une chaîne de caractères, on vérifie si artistName est inclus
          return release.artists.toLowerCase().includes(artistName.toLowerCase());
      }
      // Si ni l'un ni l'autre, on retourne false (ne pas inclure cet élément)
      return false;
  });

  // si jamais l'artiste n'a pas de sortie, on supprime les éléments, c'est qu'il y un problème avec le nom donc il faut le récupéré depuis le h2 de la page artiste
  if (artistReleases.length === 0) {
    const artistTitle = document.querySelector(".artist-title h2");
    const artistName = artistTitle.textContent.replace(/-/g, " ");
    ////////console.log(artistName);

    const artistReleasesNew = latestReleases.filter((release) => {
      // Vérifie si release.artists est un tableau
      if (Array.isArray(release.artists)) {
          // Si c'est un tableau, on vérifie si un des artistes contient artistName
          return release.artists.some((artist) => artist.toLowerCase().includes(artistName.toLowerCase()));
      } else if (typeof release.artists === 'string') {
          // Si c'est une chaîne de caractères, on vérifie si artistName est inclus
          return release.artists.toLowerCase().includes(artistName.toLowerCase());
      }
      // Si ni l'un ni l'autre, on retourne false (ne pas inclure cet élément)
      return false;
  });
  const lastArtistReleasesNew = artistReleasesNew.slice(0, 4);

  ////////console.log("4 dernières sorties de l'artiste :", lastArtistReleasesNew);
  // Si l'artiste n'a pas sorti 4 albums, on supprime les éléments restants
  for (let i = lastArtistReleasesNew.length; i < 4; i++) {
    artistsReleases[i].remove();
}

  for (let i = 0; i < 4; i++) {
    const artistRelease = artistsReleases[i];

    artistRelease.querySelector("img").src = lastArtistReleasesNew[i].cover_url;
    artistRelease.querySelector("img").alt = "cover-release-" + lastArtistReleasesNew[i].name.replace(/\s+/g, "") + "-" + lastArtistReleasesNew[i].artists.replace(/\s+/g, "");
    artistRelease.querySelector("h3").textContent = lastArtistReleasesNew[i].name;
    artistRelease.querySelector("p").textContent = lastArtistReleasesNew[i].artists;
    // ajouter un lien (créer le lien car il n'est pas présent sur la page avec create element) vers spotify qui sera placé au dessus de tout les éléments

    const a = document.createElement("a");
    a.href = lastArtistReleasesNew[i].external_urls.spotify;
    a.target = "_blank";
    a.setAttribute("aria-label", "Écouter " + lastArtistReleasesNew[i].name + " par " + lastArtistReleasesNew[i].artists + " sur Spotify");
    artistRelease.prepend(a);
    artistRelease.parentNode.insertBefore(a, artistRelease);
    a.appendChild(artistRelease);

  }

} else {

  const lastArtistReleases = artistReleases.slice(0, 4);


  ////////console.log("4 dernières sorties de l'artiste :", lastArtistReleases);
    // Si l'artiste n'a pas sorti 4 albums, on supprime les éléments restants
    for (let i = lastArtistReleases.length; i < 4; i++) {
      artistsReleases[i].remove();
  }


  for (let i = 0; i < 4; i++) {
    const artistRelease = artistsReleases[i];

    artistRelease.querySelector("img").src = lastArtistReleases[i].cover_url;
    artistRelease.querySelector("img").alt = "cover-release-" + lastArtistReleases[i].name.replace(/\s+/g, "") + "-" + lastArtistReleases[i].artists.replace(/\s+/g, "");
    artistRelease.querySelector("h3").textContent = lastArtistReleases[i].name;
    artistRelease.querySelector("p").textContent = lastArtistReleases[i].artists;

    // ajouter un lien (créer le lien car il n'est pas présent sur la page avec create element) vers spotify qui englobera tout les éléments
    const a = document.createElement("a");
    a.href = lastArtistReleases[i].external_urls.spotify;
    a.target = "_blank";
    a.setAttribute("aria-label", "Écouter " + lastArtistReleases[i].name + " par " + lastArtistReleases[i].artists + " sur Spotify");
    artistRelease.parentNode.insertBefore(a, artistRelease);
    a.appendChild(artistRelease);
  }

    ////////console.log(artistReleases);

  }



  } catch (error) {
    console.error("Une erreur est survenue :", error);
  }
}

async function main2() {
  try {
    const response = await fetch(
      "https://amethyst-plume-reading.glitch.me/dancingdeadplaylist"
    );
    const latestReleases = await response.json();
    ////////console.log("Dernières sorties :", latestReleases);

    const responseArtists = await fetch(
      "https://amethyst-plume-reading.glitch.me/dancingdeadartists"
    );
    const ArtistImg = await responseArtists.json();
    ////////console.log(ArtistImg);

    const urlParams = new URLSearchParams(window.location.search);
    const artistId = urlParams.get("artist_id");
    if (artistId) {
    ////////console.log("ID de l'artiste :", artistId);

    const artistInfo = ArtistImg.find((img) => img.id === artistId);
    ////////console.log(artistInfo);

      const postThumbnail = document.querySelector(".post-thumbnail img");
      postThumbnail.srcset = artistInfo.image_url;

      const artistTitle = document.querySelector(".artist-title h2");
      artistTitle.textContent = artistInfo.name;
      ////////console.log(artistInfo.name);

      const artistImg = document.querySelector(".artist-img img");
      artistImg.srcset = artistInfo.image_url;
      ////////console.log(artistInfo.image_url);

      const artistDescription = document.querySelector(".artist-description p");
      artistDescription.innerHTML = artistInfo.description;
      ////////console.log(artistInfo.description);

      const tagContainer = document.querySelector(".tags-container");

      const genres = artistInfo.genres
    
      for (let i = 0; i < genres.length; i++) {
        const artistGenres = document.createElement("span");
        artistGenres.className = "tag";
        tagContainer.appendChild(artistGenres);
        artistGenres.textContent = genres[i];
      }

      ////////console.log(genres);


      const artistSpotify = document.querySelector("#link-spotify");
      artistSpotify.href = artistInfo.external_urls;
      
      //////console.log(artistInfo.external_urls);


      const artistBio = document.querySelector(".artist-bio p");
      artistBio.textContent = artistInfo.bio;

      //////console.log(artistInfo.bio);
    }

    ArtistImg.sort((a, b) => b.popularity - a.popularity);



    const filterShortByDiv = document.querySelector(".filter-short-by");


    const selectShortBy = document.createElement("select");
    selectShortBy.id = "short-by";
    selectShortBy.name = "short-by";
    selectShortBy.className = "short-by-select";


    const shortByOptions = ["Popularity", "A-Z"];

    const shortByTitle = document.createElement("option");
    shortByTitle.value = "";
    shortByTitle.textContent = "Sort By";
    selectShortBy.prepend(shortByTitle);

    shortByOptions.forEach((option) => {
    const selectOption = document.createElement("option");

    selectOption.value = option.toLowerCase();
    selectOption.textContent = option;

    selectShortBy.appendChild(selectOption);
    });

    selectShortBy.addEventListener("change", (event) => {
      const value = event.target.value;

      if (value === "popularity") {
        ArtistImg.sort((a, b) => b.popularity - a.popularity);
      } else if (value === "a-z") {
        ArtistImg.sort((a, b) => a.name.localeCompare(b.name));
      }

      const artistsAll = document.getElementById("artists_all");

      while (artistsAll.firstChild) {
        artistsAll.removeChild(artistsAll.firstChild);
      }


      for (let i = 0; i < ArtistImg.length; i++) {
        const link = document.createElement("a");
        const div = document.createElement("div");
        div.className = "artist artist" + (i + 1);

        const img = document.createElement("img");
        img.src = ArtistImg[i].image_url;
        img.alt = "artist-" + ArtistImg[i].name.replace(/\s+/g, "");
        img.loading = "lazy";
        // mettre une methode Get pour récupérer l'id de l'artiste, son nom.
        link.href = "https://www.dancingdeadrecords.com/testwordpress/artist-details/?artist_id=" + ArtistImg[i].id+ "&artist_name=" + ArtistImg[i].name;
        link.className = "artist-link";

        const h3 = document.createElement("p");
        h3.textContent = ArtistImg[i].name;

        div.appendChild(img);
        div.appendChild(h3);

        link.appendChild(div);

        artistsAll.appendChild(link);

      }
    });

    filterShortByDiv.appendChild(selectShortBy);

    const artistsAll = document.getElementById("artists_all");

    while (artistsAll.firstChild) {
      artistsAll.removeChild(artistsAll.firstChild);
    }

    for (let i = 0; i < ArtistImg.length; i++) {
      const link = document.createElement("a");
      const div = document.createElement("div");
      div.className = "artist artist" + (i + 1);

      const img = document.createElement("img");
      img.src = ArtistImg[i].image_url;
      img.alt = "artist-" + ArtistImg[i].name.replace(/\s+/g, "");
      img.loading = "lazy";
      link.href = "https://www.dancingdeadrecords.com/testwordpress/artist-details/?artist_id=" + ArtistImg[i].id+ "&artist_name=" + ArtistImg[i].name;
      link.className = "artist-link";

      const h3 = document.createElement("p");
      h3.textContent = ArtistImg[i].name;

      div.appendChild(img);
      div.appendChild(h3);

      link.appendChild(div);

      artistsAll.appendChild(link);
    }




  } catch (error) {
    console.error("Une erreur est survenue :", error);
  }
}


async function main3() {
  const response = await fetch(
    "https://amethyst-plume-reading.glitch.me/dancingdeadplaylist"
  );

  const latestReleases = await response.json();
  //////console.log("Dernières sorties :", latestReleases);

  for (let i = 0; i < 4; i++) {
    const r = document.querySelector(".r" + (i + 1));

    const name = latestReleases[i].name.toLowerCase();
    const artists = latestReleases[i].artists.toLowerCase();

    r.querySelector("h3").textContent = latestReleases[i].name;
    r.querySelector("p").textContent = latestReleases[i].artists;
    r.querySelector("img").src = latestReleases[i].cover_url;
    r.querySelector("a").href = latestReleases[i].external_urls.spotify;
    r.querySelector("a").ariaLabel =
      "Écouter " +
      latestReleases[i].name +
      " par " +
      latestReleases[i].artists +
      " sur Spotify"; 
      r.querySelector("img").alt = "cover-release-" + name.replace(/\s+/g, "") + "-" + artists.replace(/\s+/g, "");
  }
}


//selectioner tout les bouton de class "elementor-button-link" et leurs attribuer un attribut target="_blank"
// seulement sur les page /artist/...
href = window.location.href;
const buttons = document.querySelectorAll(".elementor-button-link");
if (href.includes("/artists/")) {
    buttons.forEach((button) => {
      button.target = "_blank";
      // taille de bordure à 1 px 
      // si le contenu du href ne contient pas "open.spotify.." alors la bordure sera de couleur blanche
      if (!button.href.includes("open.spotify")) {
      button.style.border = "1px solid #fff";
      }
      
});
};

const imgLogo = document.querySelector('.img-logo-header');
// const artistsImg = document.querySelectorAll(".artists_home img");

/////console.log(artistsImg);

// artistsImg.forEach((img) => {
//   img.srcset = "wp-content/themes/dancingdeadrecords/img/Loading.gif";
// });

// main5();
main3();
main(); 
main2();
main4();


document.getElementById('content').innerHTML = decodedString;

const h2 = document.querySelector(".h2-title");
h2.computedStyleMap().set("height", "100px");