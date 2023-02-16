--
-- PostgreSQL database dump
--

-- Dumped from database version 13.9
-- Dumped by pg_dump version 13.9

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: Rank; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Rank" (
    id integer NOT NULL,
    "Name" character varying(30)
);


ALTER TABLE public."Rank" OWNER TO postgres;

--
-- Name: Schedules; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Schedules" (
    id integer NOT NULL,
    "startH" character varying(30),
    "endH" character varying(30),
    "startTime" character varying(30),
    "endTime" character varying(30),
    text character varying(30)
);


ALTER TABLE public."Schedules" OWNER TO postgres;

--
-- Name: Schedules_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Schedules_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Schedules_id_seq" OWNER TO postgres;

--
-- Name: Schedules_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Schedules_id_seq" OWNED BY public."Schedules".id;


--
-- Name: Users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Users" (
    id integer NOT NULL,
    login character varying(30),
    password character varying(255),
    email character varying(255),
    "ID_Rank" integer
);


ALTER TABLE public."Users" OWNER TO postgres;

--
-- Name: Users/Schedules; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."Users/Schedules" (
    "User_ID" integer NOT NULL,
    "Schedule_ID" integer
);


ALTER TABLE public."Users/Schedules" OWNER TO postgres;

--
-- Name: Users_ID_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Users_ID_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Users_ID_seq" OWNER TO postgres;

--
-- Name: Users_ID_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Users_ID_seq" OWNED BY public."Users".id;


--
-- Name: Users_details_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Users_details_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Users_details_id_seq" OWNER TO postgres;

--
-- Name: Users_details_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Users_details_id_seq" OWNED BY public."Rank".id;


--
-- Name: Users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Users_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Users_id_seq" OWNER TO postgres;

--
-- Name: Rank id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Rank" ALTER COLUMN id SET DEFAULT nextval('public."Users_details_id_seq"'::regclass);


--
-- Name: Schedules id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Schedules" ALTER COLUMN id SET DEFAULT nextval('public."Schedules_id_seq"'::regclass);


--
-- Name: Users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Users" ALTER COLUMN id SET DEFAULT nextval('public."Users_ID_seq"'::regclass);


--
-- Data for Name: Rank; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Rank" (id, "Name") FROM stdin;
\.


--
-- Data for Name: Schedules; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Schedules" (id, "startH", "endH", "startTime", "endTime", text) FROM stdin;
\.


--
-- Data for Name: Users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Users" (id, login, password, email, "ID_Rank") FROM stdin;
\.


--
-- Data for Name: Users/Schedules; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public."Users/Schedules" ("User_ID", "Schedule_ID") FROM stdin;
\.


--
-- Name: Schedules_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Schedules_id_seq"', 1, false);


--
-- Name: Users_ID_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Users_ID_seq"', 1, false);


--
-- Name: Users_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Users_details_id_seq"', 1, false);


--
-- Name: Users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Users_id_seq"', 1, false);


--
-- Name: Schedules Schedules_id_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Schedules"
    ADD CONSTRAINT "Schedules_id_key" UNIQUE (id);


--
-- Name: Schedules Schedules_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Schedules"
    ADD CONSTRAINT "Schedules_pk" PRIMARY KEY (id);


--
-- Name: Users Users_ID_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Users"
    ADD CONSTRAINT "Users_ID_key" UNIQUE (id);


--
-- Name: Rank Users_details_id_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Rank"
    ADD CONSTRAINT "Users_details_id_key" UNIQUE (id);


--
-- Name: Rank Users_details_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Rank"
    ADD CONSTRAINT "Users_details_pkey" PRIMARY KEY (id);


--
-- Name: Users Users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Users"
    ADD CONSTRAINT "Users_pkey" PRIMARY KEY (id);


--
-- Name: Users/Schedules users/schedules_schedules_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Users/Schedules"
    ADD CONSTRAINT "users/schedules_schedules_id_fk" FOREIGN KEY ("Schedule_ID") REFERENCES public."Schedules"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: Users/Schedules users/schedules_users_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Users/Schedules"
    ADD CONSTRAINT "users/schedules_users_id_fk" FOREIGN KEY ("User_ID") REFERENCES public."Users"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: Users users_rank_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public."Users"
    ADD CONSTRAINT users_rank_id_fk FOREIGN KEY ("ID_Rank") REFERENCES public."Rank"(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

