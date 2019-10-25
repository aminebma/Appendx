--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.5
-- Dumped by pg_dump version 9.3.5
-- Started on 2019-10-25 13:22:22

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 182 (class 3079 OID 11750)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 1991 (class 0 OID 0)
-- Dependencies: 182
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 175 (class 1259 OID 24609)
-- Name: ensemble_competences; Type: TABLE; Schema: public; Owner: openpg; Tablespace: 
--

CREATE TABLE ensemble_competences (
    id integer NOT NULL,
    designation character varying(100) NOT NULL
);


ALTER TABLE public.ensemble_competences OWNER TO openpg;

--
-- TOC entry 174 (class 1259 OID 24607)
-- Name: ensemble_competences_id_seq; Type: SEQUENCE; Schema: public; Owner: openpg
--

CREATE SEQUENCE ensemble_competences_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ensemble_competences_id_seq OWNER TO openpg;

--
-- TOC entry 1992 (class 0 OID 0)
-- Dependencies: 174
-- Name: ensemble_competences_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: openpg
--

ALTER SEQUENCE ensemble_competences_id_seq OWNED BY ensemble_competences.id;


--
-- TOC entry 181 (class 1259 OID 24643)
-- Name: equipe; Type: TABLE; Schema: public; Owner: openpg; Tablespace: 
--

CREATE TABLE equipe (
    id integer NOT NULL,
    user_id integer,
    projet_id integer,
    nom character varying(100),
    is_active boolean
);


ALTER TABLE public.equipe OWNER TO openpg;

--
-- TOC entry 180 (class 1259 OID 24641)
-- Name: equipe_id_seq; Type: SEQUENCE; Schema: public; Owner: openpg
--

CREATE SEQUENCE equipe_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.equipe_id_seq OWNER TO openpg;

--
-- TOC entry 1993 (class 0 OID 0)
-- Dependencies: 180
-- Name: equipe_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: openpg
--

ALTER SEQUENCE equipe_id_seq OWNED BY equipe.id;


--
-- TOC entry 173 (class 1259 OID 24596)
-- Name: projet; Type: TABLE; Schema: public; Owner: openpg; Tablespace: 
--

CREATE TABLE projet (
    id integer NOT NULL,
    user_id integer NOT NULL,
    title character varying(100) NOT NULL,
    description character varying(255) NOT NULL,
    pays character varying(50),
    ville character varying(50),
    is_remunere boolean
);


ALTER TABLE public.projet OWNER TO openpg;

--
-- TOC entry 179 (class 1259 OID 24630)
-- Name: projet_competences; Type: TABLE; Schema: public; Owner: openpg; Tablespace: 
--

CREATE TABLE projet_competences (
    id integer NOT NULL,
    projet_id integer,
    designation character varying(100)
);


ALTER TABLE public.projet_competences OWNER TO openpg;

--
-- TOC entry 1994 (class 0 OID 0)
-- Dependencies: 179
-- Name: COLUMN projet_competences.id; Type: COMMENT; Schema: public; Owner: openpg
--

COMMENT ON COLUMN projet_competences.id IS '
';


--
-- TOC entry 178 (class 1259 OID 24628)
-- Name: projet_competences_id_seq; Type: SEQUENCE; Schema: public; Owner: openpg
--

CREATE SEQUENCE projet_competences_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.projet_competences_id_seq OWNER TO openpg;

--
-- TOC entry 1995 (class 0 OID 0)
-- Dependencies: 178
-- Name: projet_competences_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: openpg
--

ALTER SEQUENCE projet_competences_id_seq OWNED BY projet_competences.id;


--
-- TOC entry 172 (class 1259 OID 24594)
-- Name: projet_id_seq; Type: SEQUENCE; Schema: public; Owner: openpg
--

CREATE SEQUENCE projet_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.projet_id_seq OWNER TO openpg;

--
-- TOC entry 1996 (class 0 OID 0)
-- Dependencies: 172
-- Name: projet_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: openpg
--

ALTER SEQUENCE projet_id_seq OWNED BY projet.id;


--
-- TOC entry 171 (class 1259 OID 24579)
-- Name: user; Type: TABLE; Schema: public; Owner: openpg; Tablespace: 
--

CREATE TABLE "user" (
    id integer NOT NULL,
    nom character varying,
    prenom character varying,
    age integer,
    pays character varying,
    ville character varying,
    pseudo character varying(100) NOT NULL,
    passwd character varying(100)
);


ALTER TABLE public."user" OWNER TO openpg;

--
-- TOC entry 177 (class 1259 OID 24617)
-- Name: user_competence; Type: TABLE; Schema: public; Owner: openpg; Tablespace: 
--

CREATE TABLE user_competence (
    id integer NOT NULL,
    user_id integer,
    designation character varying(100)
);


ALTER TABLE public.user_competence OWNER TO openpg;

--
-- TOC entry 176 (class 1259 OID 24615)
-- Name: user_competence_id_seq; Type: SEQUENCE; Schema: public; Owner: openpg
--

CREATE SEQUENCE user_competence_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_competence_id_seq OWNER TO openpg;

--
-- TOC entry 1997 (class 0 OID 0)
-- Dependencies: 176
-- Name: user_competence_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: openpg
--

ALTER SEQUENCE user_competence_id_seq OWNED BY user_competence.id;


--
-- TOC entry 170 (class 1259 OID 24577)
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: openpg
--

CREATE SEQUENCE user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO openpg;

--
-- TOC entry 1998 (class 0 OID 0)
-- Dependencies: 170
-- Name: user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: openpg
--

ALTER SEQUENCE user_id_seq OWNED BY "user".id;


--
-- TOC entry 1856 (class 2604 OID 24612)
-- Name: id; Type: DEFAULT; Schema: public; Owner: openpg
--

ALTER TABLE ONLY ensemble_competences ALTER COLUMN id SET DEFAULT nextval('ensemble_competences_id_seq'::regclass);


--
-- TOC entry 1859 (class 2604 OID 24646)
-- Name: id; Type: DEFAULT; Schema: public; Owner: openpg
--

ALTER TABLE ONLY equipe ALTER COLUMN id SET DEFAULT nextval('equipe_id_seq'::regclass);


--
-- TOC entry 1855 (class 2604 OID 24599)
-- Name: id; Type: DEFAULT; Schema: public; Owner: openpg
--

ALTER TABLE ONLY projet ALTER COLUMN id SET DEFAULT nextval('projet_id_seq'::regclass);


--
-- TOC entry 1858 (class 2604 OID 24633)
-- Name: id; Type: DEFAULT; Schema: public; Owner: openpg
--

ALTER TABLE ONLY projet_competences ALTER COLUMN id SET DEFAULT nextval('projet_competences_id_seq'::regclass);


--
-- TOC entry 1854 (class 2604 OID 24582)
-- Name: id; Type: DEFAULT; Schema: public; Owner: openpg
--

ALTER TABLE ONLY "user" ALTER COLUMN id SET DEFAULT nextval('user_id_seq'::regclass);


--
-- TOC entry 1857 (class 2604 OID 24620)
-- Name: id; Type: DEFAULT; Schema: public; Owner: openpg
--

ALTER TABLE ONLY user_competence ALTER COLUMN id SET DEFAULT nextval('user_competence_id_seq'::regclass);


--
-- TOC entry 1865 (class 2606 OID 24614)
-- Name: ensemble_competences_pkey; Type: CONSTRAINT; Schema: public; Owner: openpg; Tablespace: 
--

ALTER TABLE ONLY ensemble_competences
    ADD CONSTRAINT ensemble_competences_pkey PRIMARY KEY (id);


--
-- TOC entry 1871 (class 2606 OID 24648)
-- Name: equipe_pkey; Type: CONSTRAINT; Schema: public; Owner: openpg; Tablespace: 
--

ALTER TABLE ONLY equipe
    ADD CONSTRAINT equipe_pkey PRIMARY KEY (id);


--
-- TOC entry 1869 (class 2606 OID 24635)
-- Name: projet_competences_pkey; Type: CONSTRAINT; Schema: public; Owner: openpg; Tablespace: 
--

ALTER TABLE ONLY projet_competences
    ADD CONSTRAINT projet_competences_pkey PRIMARY KEY (id);


--
-- TOC entry 1863 (class 2606 OID 24601)
-- Name: projet_pkey; Type: CONSTRAINT; Schema: public; Owner: openpg; Tablespace: 
--

ALTER TABLE ONLY projet
    ADD CONSTRAINT projet_pkey PRIMARY KEY (id);


--
-- TOC entry 1867 (class 2606 OID 24622)
-- Name: user_competence_pkey; Type: CONSTRAINT; Schema: public; Owner: openpg; Tablespace: 
--

ALTER TABLE ONLY user_competence
    ADD CONSTRAINT user_competence_pkey PRIMARY KEY (id);


--
-- TOC entry 1861 (class 2606 OID 24587)
-- Name: user_pkey; Type: CONSTRAINT; Schema: public; Owner: openpg; Tablespace: 
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- TOC entry 1874 (class 2606 OID 24636)
-- Name: projet_id; Type: FK CONSTRAINT; Schema: public; Owner: openpg
--

ALTER TABLE ONLY projet_competences
    ADD CONSTRAINT projet_id FOREIGN KEY (projet_id) REFERENCES projet(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 1876 (class 2606 OID 24654)
-- Name: projet_id; Type: FK CONSTRAINT; Schema: public; Owner: openpg
--

ALTER TABLE ONLY equipe
    ADD CONSTRAINT projet_id FOREIGN KEY (projet_id) REFERENCES projet(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 1872 (class 2606 OID 24602)
-- Name: user_id; Type: FK CONSTRAINT; Schema: public; Owner: openpg
--

ALTER TABLE ONLY projet
    ADD CONSTRAINT user_id FOREIGN KEY (user_id) REFERENCES "user"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 1873 (class 2606 OID 24623)
-- Name: user_id; Type: FK CONSTRAINT; Schema: public; Owner: openpg
--

ALTER TABLE ONLY user_competence
    ADD CONSTRAINT user_id FOREIGN KEY (user_id) REFERENCES "user"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 1875 (class 2606 OID 24649)
-- Name: user_id; Type: FK CONSTRAINT; Schema: public; Owner: openpg
--

ALTER TABLE ONLY equipe
    ADD CONSTRAINT user_id FOREIGN KEY (user_id) REFERENCES "user"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 1990 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: openpg
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM openpg;
GRANT ALL ON SCHEMA public TO openpg;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2019-10-25 13:22:22

--
-- PostgreSQL database dump complete
--

