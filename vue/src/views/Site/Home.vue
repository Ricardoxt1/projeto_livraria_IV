<template>
  <div>
    <BasicSite />
    <div>
    <NavbarSite />
      <main style="background-color: rgb(178, 206, 239)">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button
              type="button"
              data-bs-target="#myCarousel"
              data-bs-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
            ></button>
            <button
              type="button"
              data-bs-target="#myCarousel"
              data-bs-slide-to="1"
              aria-label="Slide 2"
            ></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                class="bd-placeholder-img"
                width="2000"
                height="700"
                :src="require('@/assets/img/carousel/part2.jpg')"
                aria-hidden="true"
                preserveAspectRatio="xMidYMid slice"
                focusable="false"
              />

              <div class="container">
                <div class="carousel-caption text-start">
                  <h1>
                    Em cada livro de fantasia, uma jornada inesquecível aguarda.
                  </h1>
                  <p>
                    Abra sua mente para novos desafios dentro de páginas
                    mistériosas
                  </p>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <img
                class="bd-placeholder-img"
                width="2000"
                height="700"
                :src="require('@/assets/img/carousel/part3.jpg')"
                aria-hidden="true"
                preserveAspectRatio="xMidYMid slice"
                focusable="false"
              />
              <rect width="100%" height="100%" fill="#777" />

              <div class="container">
                <div class="carousel-caption">
                  <h1>
                    Mergulhe na fantasia e escape para reinos desconhecidos.
                  </h1>
                  <br />
                  <p>
                    <a class="btn btn-lg btn-primary" href="#"
                      >Conheça nossos livros</a
                    >
                  </p>
                </div>
              </div>
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#myCarousel"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#myCarousel"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <div class="container marketing py-5">
          <div class="row text-center py-4">
            <div class="col-lg-4">
              <img
                class="bd-placeholder-img rounded-circle"
                width="140"
                height="140"
                :src="require('@/assets/img/authors/JJTOKIEN.jpg')"
                alt="JJTOKIEN"
              />
              <rect width="100%" height="100%" fill="#777" /><text
                x="50%"
                y="50%"
                fill="#777"
                dy=".3em"
              ></text>

              <h4 class="fw-normal py-3">John Ronald Reuel Tolkien</h4>
              <p>
                Conhecido como J.R.R. Tolkien, nasceu em 3 de janeiro de 1892 e
                faleceu em 2 de setembro de 1973. Ele foi um escritor, filólogo
                e professor universitário britânico, famoso por suas
                contribuições à literatura de fantasia.
              </p>
              <p>
                <a class="btn btn-secondary" href="#">Ver livros &raquo;</a>
              </p>
            </div>
            <div class="col-lg-4">
              <img
                class="bd-placeholder-img rounded-circle"
                width="140"
                height="140"
                :src="require('@/assets/img/authors/SarahJMaas.jpg')"
                alt="SarahJMaas"
              />
              <rect width="100%" height="100%" fill="#777" /><text
                x="50%"
                y="50%"
                fill="#777"
                dy=".3em"
              ></text>

              <h4 class="fw-normal py-3">Sarah J Maas</h4>
              <p>
                Conhecida por suas séries de livros populares no gênero de
                fantasia jovem adulto. Ela nasceu em 5 de março de 1986. Maas
                ganhou destaque com suas séries "Trono de Vidro" (Throne of
                Glass) e "Corte de Espinhos e Rosas" (A Court of Thorns and
                Roses).
              </p>
              <p>
                <a class="btn btn-secondary" href="#">Ver livros &raquo;</a>
              </p>
            </div>
            <div class="col-lg-4">
              <img
                class="bd-placeholder-img rounded-circle"
                width="140"
                height="140"
                :src="require('@/assets/img/authors/JKRowling.jpg')"
                alt="JKROWLING"
              />
              <rect width="100%" height="100%" fill="#777" /><text
                x="50%"
                y="50%"
                fill="#777"
                dy=".3em"
              ></text>

              <h4 class="fw-normal py-3">Joanne Rowling</h4>
              <p>
                Conhecida como J.K.Rowling, teve reconhecimento por criar a
                popular série de livros "Harry Potter". Ela nasceu em 31 de
                julho de 1965.
              </p>
              <p>
                <a class="btn btn-secondary" href="#">Ver livros &raquo;</a>
              </p>
            </div>
          </div>

          <hr class="featurette-divider" />

          <div class="row featurette text-center py-4">
            <div class="col-md-7">
              <h2 class="featurette-heading fw-normal lh-1">
                A Sociedade do Anel, primeiro da saga Senhor dos Aneis
              </h2>
              <p class="lead pt-5">
                A saga "O Senhor dos Anéis", escrita por J.R.R. Tolkien, é uma
                jornada épica que transcende gerações e fronteiras. Ambientada
                em um mundo fictício chamado Terra-média, a narrativa entrelaça
                mitologia, amizade e coragem em uma busca épica pelo destino do
                mundo.
              </p>
            </div>
            <div class="col-md-5">
              <img
                class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                width="350"
                height="500"
                :src="require('@/assets/img/books/senhor dos aneis/SA1.jpg')"
                role="img"
                preserveAspectRatio="xMidYMid slice"
                focusable="false"
                alt="A Sociedade do Anel"
              />
            </div>
          </div>

          <hr class="featurette-divider" />

          <div class="row featurette text-center py-4">
            <div class="col-md-7 order-md-2">
              <h2 class="featurette-heading fw-normal lh-1">
                Pedra Filosofal, primeiro da saga Harry Potter
              </h2>
              <p class="lead pt-5">
                A saga de Harry Potter, escrita por J.K. Rowling, é uma jornada
                mágica que transcende gerações e fronteiras literárias. Composta
                por sete livros envolventes, a série transporta os leitores para
                um mundo repleto de feitiços, criaturas fantásticas e uma
                amizade inquebrável.
              </p>
            </div>
            <div class="col-md-5 order-md-1">
              <img
                class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                width="350"
                height="500"
                :src="require('@/assets/img/books/hp/HP1.jpg')"
                alt="Pedra Filosofal"
                preserveAspectRatio="xMidYMid slice"
                focusable="false"
              />
            </div>
          </div>

          <hr class="featurette-divider" />

          <div class="row featurette text-center py-4">
            <div class="col-md-7">
              <h2 class="featurette-heading fw-normal lh-1">
                Trono de Vidro, primeiro da saga
              </h2>
              <p class="lead pt-5">
                A saga "Trono de Vidro", é escrita pelas mãos da autora Sarah J.
                Maas, é um labirinto de intriga, magia e emoção que cativa
                leitores em uma jornada além da imaginação. A história gira em
                torno de Celaena Sardothien, uma assassina formidável, cuja
                busca por redenção desencadeia uma série de eventos que
                reverberam por todo o reino.
              </p>
            </div>
            <div class="col-md-5">
              <img
                class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                width="350"
                height="500"
                :src="require('@/assets/img/books/trono de vidro/TV1.jpg')"
                role="img"
                aria-label="Placeholder: 500x500"
                preserveAspectRatio="xMidYMid slice"
                focusable="false"
                alt="Trono de Vidro"
              />
            </div>
          </div>

          <hr class="featurette-divider mb-0 mt-5" />
        </div>
      </main>
      <FooterSite />
    </div>
  </div>
</template>

<script>
import BasicSite from "@/components/site/BasicHomeSite.vue";
import NavbarSite from "@/components/client/_partials/NavbarClient.vue";
import FooterSite from "@/components/site/_partials/FooterSite.vue";

export default {
  name: "HomeSite",
  components: {
    BasicSite,
    NavbarSite,
    FooterSite,
  },
  data() {
    return {};
  },
};
</script>

