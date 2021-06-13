# HMIF INFO PAGE

Sebuah bagian halaman web dari [HMIF UNSRI](hmifunsri.org)

![vid](demo-vid.gif)

## Requirements

- CodeIgniter 4
- PHP 7.4 or higher

## Endpoint

- /info
- /info/slug
- /curriculum
- /curriculum/slug

## Image Info
Aturan dari ukuran foto pada info adalah wajib 565x400 (lihat di public folder)

## Database Design

![Database Design](courses.png)

## Database Syntax

### Create semesters

```mariadb
CREATE TABLE semesters
(
    id              INT         NOT NULL AUTO_INCREMENT,
    name            VARCHAR(50) NOT NULL,
    slug            VARCHAR(50) NOT NULL,
    description     TEXT        NOT NULL DEFAULT '',
    references_link VARCHAR(255),
    PRIMARY KEY (id),
    UNIQUE KEY slug_unique (slug),
    INDEX name_index (name),
    INDEX description_index (description),
    INDEX references_link_index (references_link)
);
```

### Create courses

```mariadb
CREATE TABLE courses
(
    id          INT         NOT NULL AUTO_INCREMENT,
    id_semester INT         NOT NULL,
    name        VARCHAR(50) NOT NULL,
    PRIMARY KEY (id),
    INDEX name_index (name),
    CONSTRAINT fk_course_semester
        FOREIGN KEY (id_semester) REFERENCES semesters (id)
);
```

### Create subjects

```mariadb
CREATE TABLE subjects
(
    id          INT          NOT NULL AUTO_INCREMENT,
    id_course   INT          NOT NULL,
    name        VARCHAR(100) NOT NULL,
    description TEXT         NOT NULL DEFAULT '',
    PRIMARY KEY (id),
    INDEX name_index (name),
    INDEX description_index (description),
    CONSTRAINT fk_subject_course
        FOREIGN KEY (id_course) REFERENCES courses (id)
);
```

### Create infos

```mariadb
CREATE TABLE infos
(
    id          INT          NULL AUTO_INCREMENT,
    title       VARCHAR(255) NOT NULL,
    slug        VARCHAR(255) NOT NULL,
    description TEXT         NOT NULL,
    image       VARCHAR(255) NOT NULL,
    body        TEXT         NOT NULL,
    created_at  TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY slug_unique (slug),
    INDEX description_index (description),
    INDEX title_index (title),
    INDEX image_index (image),
    INDEX body_index (body),
    INDEX created_at_index (created_at)
);
```

### Insert semesters

```mariadb
INSERT INTO semesters(name, slug, description)
VALUES ('Semester 1', 'semester-1',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut egestas efficitur vestibulum. Aliquam tristique felis in nunc luctus, ut vestibulum velit ornare. Mauris porta ultrices tortor in sodales. Integer metus eros, commodo eu dui nec, faucibus aliquam lorem. Aliquam vehicula purus vehicula diam maximus dapibus. Etiam quis pharetra nibh. Curabitur ante sapien, ullamcorper sed ligula nec, semper gravida metus. Curabitur a massa sed eros ullamcorper porta ac vitae mi. Duis vestibulum dignissim sem id blandit. Nam sem tellus, fermentum eu nisi at, imperdiet maximus mauris. Ut velit lectus, ornare eget dignissim ut, accumsan sed erat. Suspendisse posuere cursus erat, at interdum ex pharetra ut. Mauris nec enim et ex convallis volutpat non a odio.'),
       ('Semester 2', 'semester-2',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut egestas efficitur vestibulum. Aliquam tristique felis in nunc luctus, ut vestibulum velit ornare. Mauris porta ultrices tortor in sodales. Integer metus eros, commodo eu dui nec, faucibus aliquam lorem. Aliquam vehicula purus vehicula diam maximus dapibus. Etiam quis pharetra nibh. Curabitur ante sapien, ullamcorper sed ligula nec, semper gravida metus. Curabitur a massa sed eros ullamcorper porta ac vitae mi. Duis vestibulum dignissim sem id blandit. Nam sem tellus, fermentum eu nisi at, imperdiet maximus mauris. Ut velit lectus, ornare eget dignissim ut, accumsan sed erat. Suspendisse posuere cursus erat, at interdum ex pharetra ut. Mauris nec enim et ex convallis volutpat non a odio.');
```

### Insert courses

```mariadb
INSERT INTO courses(id_semester, name)
VALUES (1, 'Algoritma dan Pemograman I'),
       (1, 'Fisika Dasar');
```

### Insert subjects

```mariadb
INSERT INTO subjects(id_course, name, description)
VALUES (1, 'Pengenalan Pemograman',
        'Mengenalkan hal-hal dasar yang berkaitan dengan pemograman, seperti bahasa dan tools-tools pendukung'),
       (1, 'Algoritma',
        'Mempelajari dasar algortima, seperti apa itu algoritma, bagaimana ia berjalan, notasi algoritma seperti Flowchart, Pseudo-Code'),
       (2, 'Kecepatan dan Apa lupa',
        'Mempelajari sifat dari kecepatan yaitu pemarah dan gabutan.');
```

### Insert infos

```mariadb
INSERT INTO infos(title, slug, description, image, body)
VALUES ('Ini Judul Yang Keren Banget Mwehehe', 'ini-judul-yang-keren-banget-mwehehe',
        'Hehe Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, doloribus hic inventore maiores necessitatibus perferendis sunt tempore veritatis. Cupiditate, ducimus, libero? Autem commodi corporis deleniti quis repellendus. Enim, officiis veniam.',
        'dummy-info.jpg', '<p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere hic
            assumenda incidunt similique culpa soluta, sit iste illo cumque
            fugiat obcaecati impedit molestias quaerat architecto asperiores
            neque dicta laudantium veritatis.
          </p>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti
            excepturi dolorum est, dolore suscipit cupiditate quos quidem libero
            esse! Reiciendis eaque esse sequi explicabo a. Provident quibusdam
            facere vero animi sed modi ipsa accusamus libero eaque ea odio iste,
            fuga explicabo nihil error culpa commodi, rem hic neque. Saepe,
            placeat. Saepe dicta sit veniam unde expedita architecto illo
            suscipit nobis odit laudantium deleniti, eum odio eaque. Eligendi
            facilis doloribus quod deleniti asperiores magnam, beatae excepturi
            nostrum quo repellat sunt voluptas quasi. Perferendis, sed optio!
            Laborum repellendus, delectus fugit dignissimos modi sint laudantium
            illum facilis repellat perferendis maiores, repudiandae quibusdam
            ab.
          </p>

          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt,
            ipsum :
          </p>
          <ol>
            <li>
              <h5>Lorem ipsum dolor sit amet.</h5>
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Ducimus voluptates eligendi sed. Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Est reprehenderit fuga
                exercitationem. Omnis quo natus quaerat voluptatem quisquam
                mollitia labore reiciendis rem eveniet provident odio hic
                expedita, nesciunt blanditiis minus.
              </p>
            </li>
            <li>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
                odio id rem omnis corrupti laboriosam, eveniet dolores
                blanditiis, ut, quibusdam nesciunt suscipit!
              </p>
            </li>
            <li>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Recusandae fugiat atque est soluta quibusdam nostrum aut eligendi
              quo excepturi minima mollitia similique voluptates optio,
              accusantium facere at corporis quisquam fuga.
            </li>
          </ol>'),
       ('Ini Judul Yang Keren Banget', 'ini-judul-yang-keren-banget',
        'Hehe Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, doloribus hic inventore maiores necessitatibus perferendis sunt tempore veritatis. Cupiditate, ducimus, libero? Autem commodi corporis deleniti quis repellendus. Enim, officiis veniam.',
        'dummy-info.jpg', '<p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere hic
            assumenda incidunt similique culpa soluta, sit iste illo cumque
            fugiat obcaecati impedit molestias quaerat
          </p>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti
            excepturi dolorum est, dolore suscipit cupiditate quos quidem libero
            esse! Reiciendis eaque esse sequi explicabo a. Provident quibusdam
            facere vero animi sed modi ipsa accusamus libero eaque ea odio iste,
          </p>

          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt,
            ipsum :
          </p>
          <ol>
            <li>
              <h5>Lorem ipsum dolor sit amet.</h5>
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Ducimus voluptates eligendi sed. Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Est reprehenderit fuga
                exercitationem. Omnis quo natus quaerat voluptatem quisquam
                mollitia labore reiciendis rem eveniet provident odio hic
                expedita, nesciunt blanditiis minus.
              </p>
            </li>
            <li>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
                odio id rem omnis corrupti laboriosam, eveniet dolores
                blanditiis, ut, quibusdam nesciunt suscipit!
              </p>
            </li>
            <li>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Recusandae fugiat atque est soluta quibusdam nostrum aut eligendi
              quo excepturi minima mollitia similique voluptates optio,
              accusantium facere at corporis quisquam fuga.
            </li>
          </ol>'),
       ('Ini Judul Yang Keren Bangettt', 'ini-judul-yang-keren-bangettt',
        'Hehe Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, doloribus hic inventore maiores necessitatibus perferendis sunt tempore veritatis. Cupiditate, ducimus, libero? Autem commodi corporis deleniti quis repellendus. Enim, officiis veniam.',
        'dummy-info.jpg', '<p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facere hic
            assumenda incidunt similique culpa soluta, sit iste illo cumque
            fugiat obcaecati impedit molestias quaerat architecto asperiores
            neque dicta laudantium veritatis.
          </p>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti
            excepturi dolorum est, dolore suscipit cupiditate quos quidem libero
            esse! Reiciendis eaque esse sequi explicabo a. Provident quibusdam
            facere verolectus fugit dignissimos modi sint laudantium
            illum facilis repellat perferendis maiores, repudiandae quibusdam
            ab.
          </p>

          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt,
            ipsum :
          </p>
          <ol>
            <li>
              <h5>Lorem ipsum dolor sit amet.</h5>
              <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Ducimus voluptates eligendi sed. Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Est reprehenderit fuga
                exercitationem. Omnis quo natus quaerat voluptatem quisquam
                mollitia labore reiciendis rem eveniet provident odio hic
                expedita, nesciunt blanditiis minus.
              </p>
            </li>
            <li>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime
                odio id rem omnis corrupti laboriosam, eveniet dolores
                blanditiis, ut, quibusdam nesciunt suscipit!
              </p>
            </li>
            <li>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Recusandae fugiat atque est soluta quibusdam nostrum aut eligendi
              quo excepturi minima mollitia similique voluptates optio,
              accusantium facere at corporis quisquam fuga.
            </li>
          </ol>');
```
