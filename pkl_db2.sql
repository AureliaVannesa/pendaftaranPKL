PGDMP     6    *                |            pkl_db    15.10    15.10                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            	           1262    16415    pkl_db    DATABASE     �   CREATE DATABASE pkl_db WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_United States.1252';
    DROP DATABASE pkl_db;
                postgres    false            �            1259    16449    calon    TABLE     �   CREATE TABLE public.calon (
    calon_id integer NOT NULL,
    nama_calon character varying(255),
    alamat character varying(255),
    asal character varying(255),
    no_telpon character varying(15),
    foto character varying(255)
);
    DROP TABLE public.calon;
       public         heap    postgres    false            �            1259    16448    calon_calon_id_seq    SEQUENCE     �   CREATE SEQUENCE public.calon_calon_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.calon_calon_id_seq;
       public          postgres    false    217            
           0    0    calon_calon_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.calon_calon_id_seq OWNED BY public.calon.calon_id;
          public          postgres    false    216            �            1259    16418    users    TABLE     �   CREATE TABLE public.users (
    id integer NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(255) NOT NULL,
    email character varying(100) NOT NULL,
    name character varying(100) NOT NULL
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    16417    users_id_seq    SEQUENCE     �   CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    215                       0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    214            k           2604    16452    calon calon_id    DEFAULT     p   ALTER TABLE ONLY public.calon ALTER COLUMN calon_id SET DEFAULT nextval('public.calon_calon_id_seq'::regclass);
 =   ALTER TABLE public.calon ALTER COLUMN calon_id DROP DEFAULT;
       public          postgres    false    216    217    217            j           2604    16421    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    214    215                      0    16449    calon 
   TABLE DATA           T   COPY public.calon (calon_id, nama_calon, alamat, asal, no_telpon, foto) FROM stdin;
    public          postgres    false    217   �                 0    16418    users 
   TABLE DATA           D   COPY public.users (id, username, password, email, name) FROM stdin;
    public          postgres    false    215                     0    0    calon_calon_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.calon_calon_id_seq', 16, true);
          public          postgres    false    216                       0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 17, true);
          public          postgres    false    214            q           2606    16456    calon calon_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.calon
    ADD CONSTRAINT calon_pkey PRIMARY KEY (calon_id);
 :   ALTER TABLE ONLY public.calon DROP CONSTRAINT calon_pkey;
       public            postgres    false    217            m           2606    16425    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    215            o           2606    16427    users users_username_key 
   CONSTRAINT     W   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_key UNIQUE (username);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_username_key;
       public            postgres    false    215               9   x�34��O.IT(K����J�--J��,����4��47557�L�/���*H����� ~+9         �   x����	�0���� DM��[�呸�!�!i޾6Y@:	�	~�:���V��0���33F�S����nN�a�zL����oxcP���RhM/&� %�?KJcл|�}�<�:	�9KQs��'�: wg|�     